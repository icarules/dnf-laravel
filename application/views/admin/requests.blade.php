<!-- ========================
            Content
============================= -->

<div class="row pagination-centered">
    <div class="formHeader span9">
	    <h3>Aanvragen</h3>
    </div>
</div>

<div class="row-fluid">
    <div class="span12 widget">
        <table class="table table-striped booking">
            <thead>
                <tr>
                    <th class="customerNumber">Klantnr</th>
                    <th class="name">Naam</th>
                    <th class="status">Status</th>
                    <th class="remark">Opmerking</th>
                    <th class="requestDate">Datum</th>
                    <th class="options">Acties</th>
                </tr>
            </thead>
            <tbody>
	            @foreach($requests as $request)
	                <tr>
	                    <td>{{ $request->customer_id }}</td>
	                    <td>{{ strtoupper($request->customer->honorific) . ' ' . $request->customer->last_name . ', ' . $request->customer->first_name }}</td>
	                    <td>{{ $request->status }}</td>
	                    <td class="fakePopOver"><div class="popOver" data-content="{{ $request->customer_remarks }}">{{ $request->customer_remarks }}</div></td>
	                    <td>{{ date('d-m-Y', strtotime($request->created_at)) }}</td>
	                    <td>
		                        <div class="btn-group" id="{{ $request->id }}">
			                        <a class="btn requestDetail" href="#"><i class="icon-search"></i></a>
			                        <a class="btn requestEdit" href="#"><i class="icon-edit"></i></a>
			                        <a class="btn requestDelete" href="#"><i class="icon-trash"></i></a>
			                        <a class="btn requestMails" href="#"><i class="icon-envelope"></i></a>
		                        </div>
	                    </td>
	                </tr>
	            @endforeach
            </tbody>
        </table>
    </div>
</div>