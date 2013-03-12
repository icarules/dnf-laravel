

<!-- ========================
            Header
============================= -->
<header>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="container">

                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <!-- Be sure to leave the brand out there if you want it shown -->
                <!-- logo -->
                <a class="logo" href="#"><img src="/system/dnflogo.gif"></a>

                <!-- breadcrumbs -->
<!--                <ul class="breadcrumb visible-desktop">-->
<!--                    <li class="home"><a href="#"></a></li>-->
<!--	                <li class="active"></li>-->
<!--                </ul>-->

                <!-- profile bar -->
                <ul class="profileBar">
                    <li class="user visible-desktop"><img src="/booking/img/{{ strtolower(Auth::user()->username) }}.jpg" alt=""></li>
                    <li class="profile">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->email }}
<!--	                        <span class="caret"></span>-->
                        </a>

<!--                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">-->
<!--                            <li><a tabindex="-1" href="#">Action</a></li>-->
<!--                            <li><a tabindex="-1" href="#">Another action</a></li>-->
<!--                            <li><a tabindex="-1" href="#">Something else here</a></li>-->
<!--                            <li class="divider"></li>-->
<!--                            <li><a tabindex="-1" href="#">Separated link</a></li>-->
<!--                        </ul>-->
                    </li>
<!--                    <li class="notify"><a href="#"><span>2</span></a></li>-->
	                <li class="logout">{{ HTML::link(Config::get('myauth::config.bundle_route') . '/' . Config::get('myauth::config.logout_route'), '') }}</a></li>
                    <li class="calendar"><a href="#"></a></li>
                    <li class="orders"><a href="/bestellen/admin" title="Bestellen admin" target="_blank"></a></li>
<!--                    <li class="mail"><a href="#"></a><span class="attention">!</span></li>-->
                </ul>

                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="nav-collapse collapse">
                    <!-- .nav, .navbar-search, .navbar-form, etc -->

                    <!-- top menu -->
                    <ul class="topMenu hidden-desktop">
                        <li class="active">
                            <a href="http://wbpreview.com/previews/WB01587L5/index.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="http://wbpreview.com/previews/WB01587L5/typography.html">Typography &amp; Grid</a>
                        </li>
                        <li>
                            <a href="http://wbpreview.com/previews/WB01587L5/form.html">Form elements</a>
                        </li>
                        <li>
                            <a href="http://wbpreview.com/previews/WB01587L5/buttons.html">Buttons &amp; Icons</a>
                        </li>
                        <li>
                            <a href="http://wbpreview.com/previews/WB01587L5/components.html">Components</a>
                        </li>
                        <li>
                            <a href="#">Sample menu</a>
                            <ul>
                                <li><a href="http://wbpreview.com/previews/WB01587L5/sample.html">Sample item 1</a></li>
                                <li><a href="http://wbpreview.com/previews/WB01587L5/sample.html">Sample item 2</a></li>
                                <li><a href="http://wbpreview.com/previews/WB01587L5/sample.html">Sample item 3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="http://wbpreview.com/previews/WB01587L5/javascript.html">Javascript</a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

</header>


<!-- ========================
            Sidebar
============================= -->
<aside class="visible-desktop">
    <!-- search -->
    <form class="form-search">
        <div class="input-prepend">
            <button type="submit" class="btn"></button>
            <input class="search-query" type="text">
        </div>
    </form>

    <!-- menu -->
    <ul class="sideMenu">
        <li class="active">
            <a href="#" id="menuDashboard">Dashboard</a>
        </li>
        <li>
            <a href="#" id="menuRequests">Aanvragen</a>
        </li>
        <li>
            <a href="#" id="menuBookings">Bookingen</a>
        </li>
        <li>
            <a href="#" id="menuCustomers">Klanten</a>
        </li>
        <li>
            <a href="#" id="menuEmails">Email templates</a>
        </li>
        <li class="last">
            <a href="#" id="menuConditions">Conditions</a>
        </li>
    </ul>

</aside>


<!-- ========================
            Content
============================= -->
<div id="content" class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
            <h2 class="pull-left">Dashboard</h2>
            <div class="input-prepend pull-right">
                <span class="add-on"><i class="icon-calendar"></i></span>
                <input id="prependedInput" class="text-center" placeholder="12/01/2013 - 18/01/2013" value="12/01/2013 - 18/01/2013" type="text">
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="tabbable widget">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Visitors</a></li>
                    <li><a href="#tab2" data-toggle="tab">Revenue</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="btn-group pull-right mrg-btm10" data-toggle="buttons-radio">
                            <button class="btn">Day</button>
                            <button class="btn active">Month</button>
                            <button class="btn">Year</button>
                        </div>
                        <div class="clearfix"></div>
                        <div id="linechart" style="width: 100%; height: 260px; padding: 0px; position: relative;"><canvas height="260" width="973" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 973px; height: 260px;" class="flot-base"></canvas><canvas height="260" width="973" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 973px; height: 260px;" class="flot-overlay"></canvas></div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <p>Section 2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6 widget">
            <h6 class="title">Webstats</h6>
            <table class="table table-striped">
                <thead>
                    <tr><th>Name</th>
                    <th>Attribute</th>
                    <th>Total</th>
                </tr></thead>
                <tbody><tr>
                    <td>Webstat first</td>
                    <td>Webstat first</td>
                    <td><span class="statUp">100%</span></td>
                </tr>
                <tr>
                    <td>Webstat second</td>
                    <td>Webstat second</td>
                    <td class="statDown">80%</td>
                </tr>
                <tr>
                    <td>Webstat third</td>
                    <td>Webstat third</td>
                    <td class="statUp">100%</td>
                </tr>
                <tr>
                    <td>Webstat fourth</td>
                    <td>Webstat fourth</td>
                    <td class="statUp">100%</td>
                </tr>
                <tr>
                    <td>Webstat fifth</td>
                    <td>Webstat fifth</td>
                    <td class="statDown">80%</td>
                </tr>
                <tr>
                    <td>Webstat sixth</td>
                    <td>Webstat sixth</td>
                    <td class="statUp">100%</td>
                </tr>
                <tr>
                    <td>Webstat seventh</td>
                    <td>Webstat seventh</td>
                    <td class="statUp">100%</td>
                </tr>
            </tbody></table>
        </div>
        <div class="span6 widget">
            <h6 class="title">Chartstats</h6>
            <div class="pieContainer">
                <div id="piechart" style="width: 200px; height: 260px; margin-left: 25px; padding: 0px; position: relative;"><canvas height="260" width="200" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 200px; height: 260px;" class="flot-base"></canvas><canvas height="260" width="200" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 200px; height: 260px;" class="flot-overlay"></canvas></div>
                <ul>
                    <li><span class="labelColor" style="background-color: #1BA7B0;"></span><span class="labelTotal">30.789</span><span class="labelName">Unique</span></li>
                    <li><span class="labelColor" style="background-color: #5ECCD6;"></span><span class="labelTotal">28.641</span><span class="labelName">New</span></li>
                    <li><span class="labelColor" style="background-color: #70D8AD;"></span><span class="labelTotal">18.564</span><span class="labelName">Bounced</span></li>
                    <li><span class="labelColor" style="background-color: #EEEEEE;"></span><span class="labelTotal">12.479</span><span class="labelName">Unchanged</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <h3>Visitor statistics</h3>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="tabbable widget">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab3" data-toggle="tab">Country</a></li>
                    <li><a href="#tab4" data-toggle="tab">Region</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab3">
                        <table class="table">
                            <thead>
                            <tr><th>Name</th>
                            <th>Statistic</th>
                            </tr></thead>
                            <tbody><tr>
                                <td style="width: 200px">Netherlands</td>
                                <td><span class="bar" style="width: 30%">200</span></td>
                            </tr>
                            <tr>
                                <td>United States</td>
                                <td><span class="bar" style="width: 90%">550</span></td>
                            </tr>
                            <tr>
                                <td>Germany</td>
                                <td><span class="bar" style="width: 70%">400</span></td>
                            </tr>
                            <tr>
                                <td>Italy</td>
                                <td><span class="bar" style="width: 60%">300</span></td>
                            </tr>
                            <tr>
                                <td>Suriname</td>
                                <td><span class="bar" style="width: 20%">100</span></td>
                            </tr>
                            <tr>
                                <td>France</td>
                                <td><span class="bar" style="width: 80%">500</span></td>
                            </tr>
                            <tr>
                                <td>Sweden</td>
                                <td><span class="bar" style="width: 75%">450</span></td>
                            </tr>
                        </tbody></table>
                    </div>
                    <div class="tab-pane" id="tab4">
                        <p>Section 2</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6 widget">
            <h6 class="title">Latest comments</h6>
            <ul class="comments">
                <li>
                    <div class="head">
                        <img src="/booking/img/avatar.png" alt="">
                        <span><strong>Johnatan Does</strong></span>
                        <span class="more">15-01-2013
                            <ul>
                                <li><a href="#"><img src="/booking/img/comment-flag.gif" alt="flag"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-trash.gif" alt="trash"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-reply.gif" alt="reply"></a></li>
                            </ul>
                        </span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Curabitur ornare, nulla id blandit malesuada, quam ante
 hendrerit diam, sit amet pretium elit erat ut lacus. Vestibulum
lobortis orci quis dui aliquet iaculis. Nam pulvinar facilisis leo, a
varius sapien volutpat nec. Nam porta bibendum sapien.</p>
                </li>
                <li>
                    <div class="head">
                        <img src="/booking/img/avatar.png" alt="">
                        <span><strong>Johnatan Does</strong></span>
                        <span class="more">15-01-2013
                            <ul>
                                <li><a href="#"><img src="/booking/img/comment-flag.gif" alt="flag"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-trash.gif" alt="trash"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-reply.gif" alt="reply"></a></li>
                            </ul>
                        </span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Curabitur ornare, nulla id blandit malesuada, quam ante
 hendrerit diam, sit amet pretium elit erat ut lacus. Vestibulum
lobortis orci quis dui aliquet iaculis. Nam pulvinar facilisis leo, a
varius sapien volutpat nec. Nam porta bibendum sapien.</p>
                </li>
                <li>
                    <div class="head">
                        <img src="/booking/img/avatar.png" alt="">
                        <span><strong>Johnatan Does</strong></span>
                        <span class="more">15-01-2013
                            <ul>
                                <li><a href="#"><img src="/booking/img/comment-flag.gif" alt="flag"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-trash.gif" alt="trash"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-reply.gif" alt="reply"></a></li>
                            </ul>
                        </span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Curabitur ornare, nulla id blandit malesuada, quam ante
 hendrerit diam, sit amet pretium elit erat ut lacus. Vestibulum
lobortis orci quis dui aliquet iaculis. Nam pulvinar facilisis leo, a
varius sapien volutpat nec. Nam porta bibendum sapien.</p>
                </li>
                <li>
                    <div class="head">
                        <img src="/booking/img/avatar.png" alt="">
                        <span><strong>Johnatan Does</strong></span>
                        <span class="more">15-01-2013
                            <ul>
                                <li><a href="#"><img src="/booking/img/comment-flag.gif" alt="flag"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-trash.gif" alt="trash"></a></li>
                                <li><a href="#"><img src="/booking/img/comment-reply.gif" alt="reply"></a></li>
                            </ul>
                        </span>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Curabitur ornare, nulla id blandit malesuada, quam ante
 hendrerit diam, sit amet pretium elit erat ut lacus. Vestibulum
lobortis orci quis dui aliquet iaculis. Nam pulvinar facilisis leo, a
varius sapien volutpat nec. Nam porta bibendum sapien.</p>
                </li>
            </ul>
        </div>
        <div class="span6 widget">
            <h6 class="title">Latest orders</h6>
            <table class="table">
                <thead>
                <tr><th>Invoice</th>
                <th>Date</th>
                <th>Qty</th>
                <th>Total</th>
                </tr></thead>
                <tbody><tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
                <tr><td>123456789</td><td>15-01-2013</td><td>1</td><td>499,-</td></tr>
            </tbody></table>
        </div>
    </div>

</div>
