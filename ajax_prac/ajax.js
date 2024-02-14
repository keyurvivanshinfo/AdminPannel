$("#click-me").on("click", function() {
    var num = $("#number").val()
    // console.log(num)

    $.ajax({
        url: 'allUsers.php?number=' + num,
        method: "GET",
        data: "",
        dataType: 'json',
        success: function(data) {
            // console.log(length(data));

            // var len = data.length




            data.forEach(element => {
            

                var a = $("<tr></tr>");

                var id = $("<td></td>").text(element[0]);
                var username = $("<td></td>").text(element[3]);
                var firstName = $("<td></td>").text(element[4]);

                a.append(id,username,firstName);


                $("tbody").append(a);


            });

            // $("#data").text(data)
        }
    })

})


$("#click-2").on("click",function(){
    var a = $("li").children();
    console.log(a);
})