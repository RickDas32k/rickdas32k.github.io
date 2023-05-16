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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" 
      integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
       crossorigin="anonymous" referrerpolicy="no-referrer"></script>

       <style>
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
            padding: 10px;
            background: skyblue;
            font-weight: bold;

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
         <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Product Title</th>

                    <th class="th_deg">Quantity</th>

                    <th class="th_deg">Price</th>

                    <th class="th_deg">Payment Status</th>

                    <th class="th_deg">Delivery Status</th>

                    <th class="th_deg">Image</th>

                    <th class="th_deg">Cancel Order</th>
                </tr>
                @foreach($order as $order)
                <tr>
                    <td>{{$order->product_title}}</td>

                    <td>{{$order->quantity}}</td>

                    <td>{{$order->price}}</td>

                    <td>{{$order->payment_status}}</td>

                    <td>{{$order->delivery_status}}</td>

                    <td><img calss="img_deg" height="250px" src="product/{{$order->image}}"></td>

                    <td>
                        @if($order->delivery_status=='processing')

                        <a onclick="return confirm('Are You Sure to Cancel The Order?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>
                        
                        @else

                        <p style="color: blue;" >Not Allowed</p>

                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
         </div>
    </div>
     
  

      <script type="text/javascript">
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-CommentId');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }

          function reply_close(caller)
         {
            
            $('.replyDiv').hide();
         }
         </script>

          <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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