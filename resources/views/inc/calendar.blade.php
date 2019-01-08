@include('inc.css-style')

<div id="main">
    <div class="tabbable">
            <ul class="nav nav-tabs" data-provide="tabdrop">
                    <li><a href="#" class="change" data-change="prev"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#" class="change" data-change="next"><i class="fa fa-chevron-right"></i></a></li>
                    <li class="active"><a href="#" data-view="month" data-toggle="tab" class="change-view">Month</a></li>
                    <li><a href="#" data-view="agendaWeek" data-toggle="tab" class="change-view">Week</a></li>
                    <li><a href="#" data-view="agendaDay" data-toggle="tab" class="change-view">Day</a></li>
                    <li><a href="#" class="change-today">Today</a></li>
            </ul>
            <div class="tab-content">
                    <div class="row">
                    
                            <div class="col-lg-8" >
                                    <div id="calendar"></div>
                            </div>
                    </div>
            </div>
    </div>
</div>

@include('inc.js-script')