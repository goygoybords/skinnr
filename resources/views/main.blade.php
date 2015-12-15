<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>{{ $title }}</title>
        
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ URL::asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ URL::asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        
    </head>
    <body>
       @include('navigation') 
       @yield('content')
    </body>

    <!--  Scripts-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/materialize.js') }}"></script>
    <script src="{{ URL::asset('js/init.js') }}"></script>
    <script src="{{ URL::asset('js/intlTelInput.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function()
        {
            // For Customer Record
            $('.add-customer-tg').leanModal();  
            $('.view-customer-tg').leanModal();  
            // For Product Record
            $('.add-product-tg').leanModal();  
            $('.view-product-tg').leanModal();  

            $('select').material_select();
            $('.salesOrderCustomer').change(function(){
                var id = $(".salesOrderCustomer option:selected").val();
                if(id != '')
                {
                    $.ajax({
                        type: "POST",
                        url: 'testAjax',
                        data: { _token : "{{ csrf_token() }}" , id: id },
                        success: function(data)
                        {
                            $('.addressDisplay').text(data);
                        }
                    }); // end of ajax
                }
            });

            var counter = 1;
            $('#addButton').click(function()
            {
                counter++;
                var start = "<tr><td>";
                var middle = "<select name = 'product[]' class = 'item_list"+counter+" product"+counter+ " browser-default'>";
                var end = "</select></td>" 
                        + "<td><select name = 'quantity[]' class = 'quantity"+counter+" browser-default'></select</td>";

                var end2 = "<td><span class = 'lblUom"+counter+"'></span></td>";
                var end3 = "<td><input type = 'text' class = 'lblUprice"+counter+"' name = 'unit_price[]'></td>";
                var end4 = "<td><input type = 'text' class = 'lblAmount"+counter+"' name = 'amount[]''></td>";
                var superEnd = "</tr>";
                var combine = start + middle + end + end2 + end3  + end4 + superEnd;
                $.ajax({
                        type: "GET",
                        url: 'getAllItem',
                        data: 'json',
                        success: function(data)
                        {
                            $('.ci-entry-table tbody').prepend(combine);
                            $('.product'+counter).append('<option disabled selected>Choose Items Here</option>');
                            for (var i = 0; i < data.length; i++) 
                            {
                                $('.product'+counter).append('<option value='+data[i].product_id+'>'+data[i].description+'</option>');
                                
                            }

                            $('.quantity'+counter).append('<option disabled selected>Quantity</option>');
                            for (var i = 1; i <= 10; i++) 
                            {
                                 $('.quantity'+counter).append('<option value ='+i+'>'+ i +'</option>');
                                
                            }

                            $('.item_list'+counter).change(function()
                             {
                                
                                var item = $(".item_list"+counter+" option:selected").val();
                                if(item != '')
                                {
                                    $.ajax({
                                        type: "POST",
                                        url: 'getItem',
                                        data: { _token : "{{ csrf_token() }}" , item: item },
                                        success: function(data)
                                        {   
                                            $('.lblUom'+counter).text(data[0]);
                                            var uprice = parseFloat($('.lblUprice'+counter).val(data[1]));
                                            // compute amount
                                             $('.quantity'+counter).change(function()
                                             {
                                                var qty = parseInt($(".quantity"+counter+" option:selected").val() );
                            
                                                if(qty != '')
                                                {
                                                    var amount = data[1] * qty;
                                                    $('.lblAmount'+counter).val(amount);   
                                                    var getAmount = $('.lblAmount'+counter).val();

                                                    // compute total
                                                    var total = parseFloat($('.displayTotal').val());
                                                    total = total + amount;
                                                    var vat =  total * .12;
                                                    var vatsales = total - vat;

                                                    $('.displayVatSales').attr("value", vatsales.toFixed(2));
                                                    $('.displayVat').attr("value", vat.toFixed(2));
                                                    $('.displayTotal').attr("value", total.toFixed(2));
                                                }
                                            }); 
                                        }
                                    }); // end of ajax
                                }//end of if
                            });//end of item list
                        }
                    }); // end of ajax                 
            }); // end of add button


             $('.item_list').change(function()
             {
                var item = $(".item_list option:selected").val();
                if(item != '')
                {
                    $.ajax({
                        type: "POST",
                        url: 'getItem',
                        data: { _token : "{{ csrf_token() }}" , item: item },
                        success: function(data)
                        {   
                            $('.lblUom').text(data[0]);

                            var uprice = parseFloat($('.lblUprice').val(data[1]));
                            // compute amount
                             $('.quantity').change(function()
                             {
                                var qty = parseInt($(".quantity option:selected").val());
                                if(qty != '')
                                {
                                    var amount = data[1] * qty;
                                    $('.lblAmount').val(amount);   

                                    var total = amount;
                                    var vat =  total * .12;
                                    var vatsales = total - vat;

                                    $('.displayVatSales').attr("value", vatsales.toFixed(2));
                                    $('.displayVat').attr("value", vat.toFixed(2));
                                    $('.displayTotal').attr("value", total.toFixed(2));
                                }
                            });
                        }
                    }); // end of ajax
                }//end of if
            });//end of item list
        }); //end of js
    </script>
</html>
