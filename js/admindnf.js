/**
 * DNF Style Admin - Backend javascript
 *
 * Created by Crazy Cow Creations
 * info@crazycowcreations.com
 * http://www.crazycowcreations.com
 *
 * Date: 28-2-2013
 */

$(document).ready(function () {

    // Make the side menu items do something
    $('ul.sideMenu a').click(function (e) {

	    if ('menuDashboard' == $(e.target).attr('id')) return true;

        // Prevent the default behaviour for the clicked element (a link in this case)
        e.preventDefault();

        // Let somebody else handle the click
        sideMenu.delegator($(e.target).attr('id'));

        // Returning false means nothing will bubble up
        return false;
    });

	// Make the crud page menus responsive
	$('#content').on('click', '.crudMenu', function (e) {
		e.preventDefault();

		pageActions.optionHandler($(e.target));
	});

	// Delete error class from inputs once they get the focus
	$('#content').on('focus', '.inputError', function (e) {
		e.preventDefault();

		$(e.target).removeClass('inputError');
	});

	$('li.calendar').click(function () {

	});

});

var sideMenu = function () {

    // Define vars
    var page,

        delegator = function (menuId) {

            // Highlight the clicked menu item
            highlight(menuId);

            // Get the admin method from the menu id
	        menuId = menuId.substr(4);
            page = menuId.charAt(0).toLowerCase() + menuId.slice(1);

            // Get the requested page
            utils.getPage(page);
        },

        highlight = function (menuId) {

            // First remove the active class from all menu items
            $('ul.sideMenu li').removeClass('active');

            // And now add the active class to the clicked menu item
            $('#' + menuId).parent().addClass('active');
        },

        endStub;

    return {
        delegator: delegator
    }
}();

var pageActions = function () {
    var goAction, actionTarget, rowId, containerId,

        optionHandler = function (target) {

            if (target.hasClass('btn') || target.parent().hasClass('btn')
		        || target.hasClass('btn-small') || target.parent().hasClass('btn-small')) {

                actionTarget = (target.hasClass('btn') || target.hasClass('btn-small') ? target : target.parent());
                goAction     = actionTarget.attr('class').split(' ').pop();
                rowId        = actionTarget.parent().attr('id');
                containerId  = actionTarget.parent().data('targetId');

            } else {

	            // Get the tagname of the clicked element
	            if ('tr' != target.prop("tagName").toLowerCase()) {
		            target = target.closest('tr');
	            }

	            // Does this row have a detail link?
		        if ($('a.requestDetail', target).length > 0){
		            if ($('div.btn-group', target).attr('id').length > 0) {

			            goAction = 'requestDetail';
			            rowId    = ($('div.btn-group', target).attr('id'));
                        containerId  = $('div.btn-group', target).data('targetId');
		            }
		        }

	            // Does this row have a detail link?
		        if ($('a.customerDetail', target).length > 0){
		            if ($('div.btn-group', target).attr('id').length > 0) {

			            goAction = 'customerDetail';
			            rowId    = ($('div.btn-group', target).attr('id'));
                        containerId  = $('div.btn-group', target).data('targetId');
		            }
		        }


	            // Does this row have a detail link?
		        if ($('a.emailTemplateDetail', target).length > 0){
		            if ($('div.btn-group', target).attr('id').length > 0) {

			            goAction = 'emailTemplateDetail';
			            rowId    = ($('div.btn-group', target).attr('id'));
                        containerId  = $('div.btn-group', target).data('targetId');
		            }
		        }
            }

	        if('Delete' == goAction.substr(-6)) {
		        if (confirm('Weet u zeker dat u dit item wilt verwijderen?')) {
			        $('#' + goAction + ' input[name="deleteId"]').val(rowId);
			        utils.postForm(goAction);
		        }
	        } else {
		        utils.getPage(goAction, rowId, containerId);
	        }
        },

        endStubDummy;

    return {
        optionHandler: optionHandler
    }
}();

var utils = function () {
	var method, url,

		getPage = function (page, id, containerId, data) {

			id = id || '';

			if ('undefined' == typeof data) {
				data = {};
				method = 'GET';
			} else {
				method = 'POST';
			}

			containerId = containerId || 'content';

			$.ajax({
				url:'/booking/admin/' + page + '/' + id,
				dataType:'json',
				method: method,

				success:function (response) {
					if (response.status == 'success') {

						// Set the page content
						$('#' + containerId).html(response.message);

						// Bind events and stuff to the newly loaded content
						pageBinds(page);

					} else {
						console.log('The page could not be loaded', response.message);
					}
				},

				error:function (req, status, err) {
					console.log('The ajax request failed: ', status, err);
				}
			});
		},

		postForm = function (formId) {
			var theForm = $('#' + formId), page, id;
			url = theForm.attr('action');

			$.ajax({
				url: url,
				dataType:'json',
				method: 'POST',
				data: theForm.serialize(),

				success:function (response) {
					if (response.status == 'ok') {

						if (response.hasOwnProperty('redirect') && response.redirect.length > 0) {

							redirectParts = response.redirect.split('/');
							page = redirectParts[0];
							id   = redirectParts[1];

							utils.getPage(page, id);
						} else if(response.hasOwnProperty('debugMode')) {

							if ('debug' == response.debugMode) {
								$('header').addClass('debugMode');
							} else {
								$('header').removeClass('debugMode');
							}

							alert('De gegevens zijn opgeslagen');

						} else {
							alert('De gegevens zijn opgeslagen');
						}

					} else if (response.status == 'notfound') {

						alert(response.message);

					} else if (response.status == 'error') {

						var errors = response.messages, errorAlert = '';

						for (var key in errors) {
							if (errors.hasOwnProperty(key)) {

								$('#' + key).addClass('inputError');

								if (0 == $('#' + key + 'Alert').length) {
									errorAlert = '<div id="' + key + 'Alert" class="alert alert-error fade" data-alert="alert">';
									errorAlert += '<a class="close" href="#" data-dismiss="alert">×</a>' + errors[key] + '</div>';

									$('#' + key).parent().before(errorAlert);

									$('#' + key + 'Alert').addClass("in");
								}

						        console.log(key + " -> " + errors[key]);
							}
						}

					} else {
						console.log('The post went wrong');
					}
				},

				error:function (req, status, err) {
					console.log('The ajax request failed: ', status, err);
				}
			});
		},

		pageBinds = function (page) {

			switch (page) {
				case 'requestMails':
					// Show popovers
					$('.popOver').popover({trigger:'hover', placement:'bottom'});

					// Don't break here, we want a clickable body

				case 'requests':
					// Show popovers
					$('.popOver').popover({trigger:'hover', placement:'right'});

					// Don't break here, we want a clickable body

				case 'emailTemplates':
				case 'customers':

					// Make the table rows clickable
					$('table.list tbody').on("click", "tr", function (e) {

						// Handle the click on the row
						pageActions.optionHandler($(e.target));
					});
					break;

				case 'requestMailNew':
				case 'requestMailEdit':

					$('#emailTemplate').change( function(){ getTemplate($(this).val()); } );

					// Init the wysiwig editor for the email body
					$('#emailBody').wysihtml5({'html': true, 'color': true});

					$('#saveRequestMail').click(function (e) {
						e.preventDefault();

						// Remove the error alerts
						$('.alert-error').remove();

						postForm('editRequestMail');
					});

					$('#saveAndSendRequestMail').click(function (e) {
						e.preventDefault();

						// Set the sendMail field
						$('input[name="sendMail"]').val(1);

						// Remove the error alerts
						$('.alert-error').remove();

						postForm('editRequestMail');
					});
					break;

				case 'requestNew':
				case 'requestEdit':
					$('#saveRequest').click(function (e) {
						e.preventDefault();

						// Remove the error alerts
						$('.alert-error').remove();

						postForm('editRequest');
					});

					break;

				case 'customerNew':
				case 'customerEdit':
					$('#saveCustomer').click(function (e) {
						e.preventDefault();

						// Remove the error alerts
						$('.alert-error').remove();

						postForm('editCustomer');
					});

					break;

				case 'emailTemplateNew':
				case 'emailTemplateEdit':

					// Init the wysiwig editor for the email body
					$('#emailBody').wysihtml5({'html': true, 'color': true});

					$('#saveEmailTemplate').click(function (e) {
						e.preventDefault();

						// Remove the error alerts
						$('.alert-error').remove();

						postForm('editEmailTemplate');
					});

					break;

				case 'settings':
					$('#saveSettings').click(function (e) {
						e.preventDefault();

						// Remove the error alerts
						$('.alert-error').remove();

						postForm('settings');
					});

					break;
			}

		},

		getTemplate = function (id) {

			var bookingId = $('input[name="bookingId"]').val();

			if (0 == id) {
				switchTemplate();
			} else {

				$.ajax({
					url:'/booking/admin/emailTemplate/' + id + '/' + bookingId,
					dataType:'json',
					method: method,

					success:function (response) {
						if (response.status == 'success') {

							// Bind events and stuff to the newly loaded content
							switchTemplate(response.template);

						} else {
							console.log('The template could not be loaded', response.message);
						}
					},

					error:function (req, status, err) {
						console.log('The ajax request failed: ', status, err);
					}
				});
			}

		},

		switchTemplate = function (template) {

			var wysihtml5Editor = $('#emailBody').data("wysihtml5").editor,
				emailSubject = ('undefined' == typeof template ? '' : template.subject),
				emailBody    = ('undefined' == typeof template ? '' : template.text);

			$('#subject').val(emailSubject);

			$('#emailBody').val(emailBody);

			wysihtml5Editor.setValue(emailBody);

		},

		endStubDummy;

	return {
		getPage: getPage,
		postForm: postForm
	}
}();
