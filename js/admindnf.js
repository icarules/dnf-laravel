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
            page = menuId.toLowerCase().substr(4);

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
    var goAction, actionTarget, rowId,

        optionHandler = function (target) {

            if (target.hasClass('btn') || target.parent().hasClass('btn')) {

                actionTarget = (target.hasClass('btn') ? target : target.parent());
                goAction     = actionTarget.attr('class').split(' ').pop();
                rowId        = actionTarget.parent().attr('id');

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
		            }
		        }
            }

	        utils.getPage(goAction, rowId);
        },

        endStubDummy;

    return {
        optionHandler: optionHandler
    }
}();


var utils = function () {
	var method,

		getPage = function (page, id, data) {

			if ('undefined' == typeof data) {
				data = {};
				method = 'GET';
			} else {
				method = 'POST';
			}

			$.ajax({
				url:'/booking/admin/' + page + '/' + id,
				dataType:'json',
				method: method,

				success:function (response) {
					if (response.status == 'success') {

						// Set the page content
						$('#content').html(response.message);

						// Bind events and stuff to the newly loaded content
						pageBinds(page);
						console.log(page);

					} else {
						console.log('The page could not be loaded', response.message);
					}
				},

				error:function (req, status, err) {
					console.log('The ajax request failed: ', status, err);
				}
			});
		},

		pageBinds = function (page) {

			switch (page) {
				case 'requests':
					// Show popovers
					$('.popOver').popover({trigger:'hover', placement:'right'});

					// Make the table rows clickable
					$('table.booking tbody').on("click", "tr", function (e) {

						// Handle the click on the row
						pageActions.optionHandler($(e.target));
					});
					break;

				case 'requestDetail':


					break;

				case 'requestEdit':


					break;
			}

		},

		endStubDummy;

	return {
		getPage: getPage
	}
}();
