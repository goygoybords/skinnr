@extends('main')
	@section('content')
		<br>
		<div class = "container">
			<label>Welcome {{ Auth::user()->name }} </label>
			<ul class="collapsible" data-collapsible="accordion">
				<li>
					<div class="btn collapsible-header" style = "color:black;">
						<i class="material-icons">assignment</i>Product Record
					</div>
      				<div class="collapsible-body">
      					<p>
	      					<a class = "waves-effect waves-light btn add-product-tg" href = "#AddProductModal">
								Add Product Record
							</a>
							<a class = "waves-effect waves-light btn view-product-tg" href = "#ViewProductModal">
								View Product List
							</a>
						</p>
      				</div>
	    		</li>
				<li>
					<div class="btn collapsible-header" style = "color:black;">
						<i class="material-icons">perm_identity</i>Customer Record
					</div>
      				<div class="collapsible-body">
      					<p>
	      					<a class = "waves-effect waves-light btn add-customer-tg" 
	      						href = "#AddCustomerModal">Add Customer Record
							</a>
							<a class = "waves-effect waves-light btn view-customer-tg" 
								href = "#ViewCustomerModal">
								View Customer List
							</a>
						</p>
      				</div>
	    		</li>
			<ul>
		</div>
			<!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal1">
				Modal
			</a> -->
			<!-- Modal Structure -->
			<div id="AddCustomerModal" class="modal modal-fixed-footer">
				{!! Form::open(array('class' => 'col s12' , 'method' => 'post' , 'route' => 'addCustomer'))  !!}
				<div class="modal-content">
					<h4>Customer Fill-Up Form</h4>
					<p>
						<div class="row"> 
 		   					<div class="input-field col s6">
 		   						<input id="name" type="text" name = "name" class="validate" >
 		   						<label for="name">Name</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="address" type="text" name = "address" class="validate" >
    							<label for="address">Address</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="contact_person" type="text" name = "contact_person" class="validate" >
    							<label for="contact_person">Contact Person</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="contact_number" type="tel" name = "contact_number" 
    							class="validate"  >
    							<label for="contact_number">Phone Number/Mobile Number</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="credit_limit" type="text" name = "credit_limit" class="validate" >
    							<label for="credit_limit">Credit Limit</label>
    						</div>
        				</div>
					</p>
				</div>
				<div class="modal-footer">
					<button class=" modal-action modal-close waves-effect waves-green btn-flat">Save Record</button>
	    		</div>
	    		{!! Form::close() !!}
  			</div>
  			<div id="ViewCustomerModal" class="modal modal-fixed-footer">
				<div class="modal-content">
					<h4>Customer List</h4>
					<p>
						<table class="bordered centered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>Contact Person</th>
									<th>Contact Number</th>
									<th>Credit Limit</th>
									<th>Balance</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($customer_list as $c)
									<tr>
										<td>{{ $c->name }}</td>
										<td>{{ $c->address }}</td>
										<td>{{ $c->contact_person }}</td>
										<td>{{ $c->contact_number }}</td>
										<td>{{ $c->credit_limit }}</td>
										<td>{{ $c->credit_balance }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</p>
				</div>
				<div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
	    		</div>
  			</div>

  			<!-- Product Modal -->
  			<div id="AddProductModal" class="modal modal-fixed-footer">
				{!! Form::open(array('class' => 'col s12' , 'method' => 'post' , 'route' => 'addProduct'))  !!}
				<div class="modal-content">
					<h4>Product Fill-Up Form</h4>
					<p>
						<div class="row"> 
 		   					<div class="input-field col s6">
 		   						<input id="description" type="text" name = "description" class="validate" >
 		   						<label for="description">Description</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="category" type="text" name = "category" class="validate" >
    							<label for="category">Category</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="	unit_of_measurement" type="text" name = "unit_of_measurement" class="validate" >
    							<label for="unit_of_measurement">Unit of Measurement</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="unit_price" type="text" name = "unit_price" 
    							class="validate"  >
    							<label for="unit_price">Unit Price</label>
    						</div>
    						<div class="input-field col s6">
    							<input id="quantity_on_hand" type="text" name = "quantity_on_hand" class="validate" >
    							<label for="quantity_on_hand">Quanity on Hand</label>
    						</div>
        				</div>
					</p>
				</div>
				<div class="modal-footer">
					<button class=" modal-action modal-close waves-effect waves-green btn-flat">Save Record</button>
	    		</div>
	    		{!! Form::close() !!}
  			</div>

  			<div id="ViewProductModal" class="modal modal-fixed-footer">
				<div class="modal-content">
					<h4>Product List</h4>
					<p>
						<table class="bordered centered">
							<thead>
								<tr>
									<th>Id</th>
									<th>Description</th>
									<th>Category</th>
									<th>UOM</th>
									<th>Unit Price</th>
									<th>Quantity on Hand</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($product_list as $c)
									<tr>
										<td>{{ $c->product_id }}</td>
										<td>{{ $c->description }}</td>
										<td>{{ $c->category }}</td>
										<td>{{ $c->unit_of_measurement }}</td>
										<td>{{ $c->unit_price }}</td>
										<td>{{ $c->quantity_on_hand }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</p>
				</div>
				<div class="modal-footer">
					<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
	    		</div>
  			</div>
  			<br>
  			{!! Form::open(array('method' => 'POST' , 'route' => 'addCashInvoice') )   !!}
  			<form class = "cash-invoice-form" method = "POST">
  			<div>
  				<div class = "row">
  					<div id = "form-title">
  						<center>
	  						<span>Skinnr<span>
	  							<br>
	  						<span>3rd Floor North Atrium Bldg Prime 88 Travel Inc. 
	  							Mandaue City Cebu </span>
	  							<br>
	  						<span>Cash Invoice Entry</span>
  						</center>
  					</div>
  				
      			
      			<div class = "row">
  					<div class="input-field col s1">
   						<input id="invoice_number" type="text" name = "invoice_number" value = "{{ ++$invoice_number }}">
   						<label for="invoice_number">Invoice Number: </label>
    				</div>
    			</div>

    			<div class = "row">
    				<div class="input-field col s3">
	  					Sold to:  
	  					<select required name = "customer" class = "salesOrderCustomer browser-default">
	  							<option disabled selected>Choose Customer Here</option>
	  						@foreach($customer_list as $c)
	  							<option value ="{{ $c->customer_id }}">{{ $c->name }}</option>
	  						@endforeach
	  					</select>
 				 	</div>
  					<div class="input-field col s1">
   						<input id="order_date" type="text" name = "order_date" value = "{{ date('m/d/Y') }}">
   						<label for="order_date">Date</label>
    				</div>
  				</div>
  		
  				<br>
  				Address: <span class = "addressDisplay"></span>
  				<table class = "ci-entry-table centered bordered">
  					<thead>
  						<tr>
  							<th>ITEM NO</th>
  							<th>Quantity</th>
  							<th>UOM</th>
  							<th>Unit Price</th>
  							<th>Amount</th>
  						<tr>
  					</thead>
  					<tbody>
  						<tr>
  							<td>
  								<select required name = "product[]" class = "item_list browser-default">
	  							<option disabled selected>Choose Items Here</option>
			  						@foreach($product_list as $c)
			  							<option value ="{{ $c->product_id }}">{{ $c->description }}</option>
			  						@endforeach
			  					</select>
  							</td>
  							<td>
  								<select required name = "quantity[]" class = "quantity browser-default">
	  							<option disabled selected>Quantity</option>
	  							@for ($i = 1; $i <= 10; $i++)
								    <option value ="{{ $i }}">{{ $i }}</option>
								@endfor
			  					
			  					</select>
			  				</td>
  							<td><span class = "lblUom"></span></td>
  							<td><input type = "text" class = "lblUprice" name = "unit_price[]"></td>
  							<td><input type = "text" class = "lblAmount" name = "amount[]"></td>
  						</tr>
  						<tr>
  							<td></td>
  							<td></td>
  							<td></td>
  							<td>Vat Sales:</td>
  							<td><input type = "text" name = "vat_sales" class = "displayVatSales" ></td>
  						</tr>
  						<tr>
  							<td></td>
  							<td></td>
  							<td></td>
  							<td>Vat:</td>
  							<td><input type = "text" name = "vat" class = "displayVat" ></td>
  						</tr>
  						<tr>
  							<td></td>
  							<td></td>
  							<td></td>
  							<td>Total:</td>
  							<td><input type = "text" name = "total" class = "displayTotal"></td>
  						</tr>
  					</tbody>
  				</table>
    							
      			
      			<br>
  				<div class = "row">
  					<div class="input-field col s6">
   						<input id="prepared_by" type="text" name = "prepared_by" value = "{{ Auth::user()->name }}" >
   						<label for="prepared_by">Prepared By: </label>
    				</div>
  					<div class="input-field col s6">
   						<input required id="received_by" type="text" name = "received_by" >
   						<label for="received_by">Received By: </label>
    				</div>
    			</div>
    			<div class = "row">
  					<center><Button class="waves-effect waves-light btn">Save Record</Button></center>
    			</div>
  			</div>
  			{!! Form::close() !!}

  			<input type='button' value='Add Button' id='addButton'>
  			@if($errors->has())
	  			@foreach ($errors->all() as $error)
	      			<div id="error_message">{{ $error }}</div>
				@endforeach

			@elseif (Session::has('msg'))
	   			<div id="error_message">{{ Session::get('msg') }}</div>
	      	@endif
	@endsection

