<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baddinews.in | Website for Sale | News about Baddi, Barotiwala and Nalagarh | For Sale</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="bg-red-400">

<div class="p-4 bg-white">
   <h1 class="text-4xl font-bold text-center">
          Website is for Sale...
   </h1>
</div>      

<div class="max-w-7xl mx-auto mt-6 p-4 font-RobotoFlex">
    <div class="container mx-auto">
         <div class="bg-white p-4 sm:w-1/2 lg:w-1/2 md:w-full mx-auto rounded-md shadow-lg shadow-gray-700 font-mono">
             <span class="text-2xl">Rs 10,000 Base Price</span> 
             <br/>
             <form method="post" action="#">
             <div class="text-3xl font-bold mt-4 flex flex-wrap gap-4">
                <div class="w-1/2">Enter your bid</div>
                <div><input class="border-[1px] border-gray-700 rounded-md" id="bid_price" type="text" size="14" placeholder="15000"/></div>
                <div class="w-1/2">Email ID</div><div><input id="email_id" class="border-[1px] border-gray-700 rounded-md" type="email" size="14" placeholder="email_id@domain.com"/></div>
                <div class="w-1/2">Mobile No.</div><div><input id="mobile_no" class="border-[1px] border-gray-700 rounded-md" type="text" size="14" placeholder="7864576098"/></div>
             </div>
            <div class="mt-4">
             <input type="submit" id="ask_bid" class="border-[1px] p-2 border-gray-800 rounded-md text-sm bg-blue-800 text-white hover:bg-blue-700" value="Ask Bid"/>
            </div>
        </form>
         </div>
    </div>
 </div>   
    
</body>

<script>
$(document).ready(function() {
    $(document).on("click", "#ask_bid", function(e){
        e.preventDefault();
        var post_url = "ask_bid.php";
        var bid_price = $("#bid_price").val();
        var email = $("#email_id").val();
        var mobile = $("#mobile_no").val();
        const formData = {"bid_price": bid_price, "email_id": email, "mobile":mobile};
        $.ajax
        ({
            url : post_url,
            type: "POST",
            data : formData,
            success: function(data, textStatus, jqXHR)
            {
                //data - response from server
                alert(data);
                $("#bid_price").val("");
                $("#email_id").val("");
                $("#mobile_no").val("");
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            console.log(errorThrown);
            }
        });
    });
});
</script>

</html>