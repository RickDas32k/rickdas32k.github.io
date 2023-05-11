<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
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
      <link href="home/css/new.css" rel="stylesheet" />

      <link rel="stylesheet" href="home/css/product.css">

      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


      <div class="container-2 single-product">
        <div class="row">
            <div class="col-new">
                <img src="product/{{$product->image}}" width="60%" id="productimg">
            </div>
            <div class="col-2">
                <p>Home / {{$product->title}}</p>
                <h1>{{$product->title}}</h1>
                
                @if($product->discount_price!=null)
                        <H4 style="color: red">
                        Discount Price<br>
                           ₹{{$product->discount_price}}
                        </H4>
                        
                        <H4 style="text-decoration: line-through; color: blue">
                        Price<br>
                           ₹{{$product->price}}
                        </H4>
                        @else
                        <H4 style="color: blue">
                        Price<br>
                           ₹{{$product->price}}
                        </H4>
                        @endif
               <div class="btn-add2">
               <form action="{{url('add_cart',$product->id)}}" method="Post">

                  @csrf


                        

                  <input type="number" name="Quantity" value="1" min="1" style="width: 100px">         
                        <br>
                  
                     <input type="submit" value="Add to Cart"></a>
            
                  
               </form>
               </div>
                <h3>Product Details <i class="fas fa-indent"></i></h3>
             
                <p><b>Catagory:</b> {{$product->catagory}}</p>
                <p><b>Details:</b>  {{$product->description}}</p>
                <p><b>Available Quantity:</b>  {{$product->quantity}}</p>
            </div>
        </div>
    </div>


      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      @include('home.chin')
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