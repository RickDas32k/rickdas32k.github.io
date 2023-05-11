<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <!-- Sweet Alert cdn link -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
      <style type="text/css">

        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 30px;
        }

        table,th,td
        {

            border: 1px solid grey;
        }

        .th_deg
        {
            font-size: 20px;
            padding: 5px;
            background: skyblue;

        }

        .img_deg
        {
            height: 50px;
            width: 10px;

        }

        .total_deg
        {
         font-size: 35px;
         padding: 40px;
        }

      </style>
   </head>
   <body>

        
   
   @include('sweetalert::alert')

      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->
      
      <!-- why section -->

      @if(session()->has('message'))
            <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session()->get('message')}}
            </div>
            @endif
     
        <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>

                <?php $totalprice=0; ?>

                @foreach($cart as $cart)

                <tr>
                   <td>{{$cart->product_title}}</td>
                   <td>{{$cart->quantity}}</td>
                   <td>{{$cart->price}}/-</td>
                   <td><img calss="img_deg" height="250px" src="/product/{{$cart->image}}"></td>
                   <td>
                     <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('remove_cart',$cart->id)}}">Remove Product</a></td>
                    
                </tr>

                <?php $totalprice=$totalprice + $cart->price; ?>
                @endforeach

               
            </table>
            <div>

            <h1 class="total_deg">Total Price : <b>{{$totalprice}}/-</b></h1>
            </div>


        <div>

            <h1 style="font-size: 30px; padding-bottom: 15px;"><u>Proceed to Order</u></h1>

            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>

            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>
        </div>
    </div>


      <!-- footer start -->

      <!-- footer end -->
      @include('home.chin')

      <script>
          function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to cancel this product",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {


                    window.location.href = urlToRedirect;
                }
                });
            }
      </script>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>