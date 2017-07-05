//global Access
var result;
var saveid;
var domid;
var myarray={};

//auto called function
function codeAddress() {
  //call function after time finished
  function tes(){
    alert("finished");
  }

  setTimeout(function() {   //calls click event after a certain time
    tes();
  }, 5000);




  var count=30;

var counter=setInterval(timer, 10000); //1000 will  run it every 1 second

function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
     //counter ended, do something here
     return;
  }
document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
  //Do code for showing the number of seconds here
}


  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../controller/Ctrl_Question.php",
    //  data:{Qid:Qid},

    success: function(data) {

      //alert(Object.keys(data).length
      result = data;
      var a = 0;
      var pageButtons = $('#try');
      for (var key in data) {

        a++;
        //var ab=data[key].query;
        ///if(ab==0){
        //  pageButtons.append('<button onclick="myFunction(this.id)" class="btn" id="'+data[key].question_id+'">'+a+'</button>');
        //  }
        //else {
        pageButtons.append('<button onclick="myFunction(this.id)" class="btn btn-info " id="' + data[key].rank + '">' + a + '</button>');
        //}

      }


    }
  });

}
//function to dispaly question by clicking button
function myFunction(id) {
  //alert("dd");
  domid = id;
  //
  var a = id - 1;

  saveid = result[a].question_id;

  //var id = data["query"];
  //  if(id!==null) {
  //    $(".btnt").addClass('btn-info');
  //  }   //get id
  var vname = result[a].question_text;
  var q=myarray[id];
  $('#qry_text').val(q);
  $('#quest').html(vname);

  //ajax call to get the answer table
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../controller/Ctrl_getAnswer.php",
    //  data:{Qid:Qid},

    success: function(data) {






    }
  });

}




//ajax function to update answer
$(document).ready(function() {
  $(".btn_insert").click(function() {
    //var Qid=$(".btn").attr("id");

    var qry = $('#qry_text').val();
    if (qry!== 0) {
myarray[domid]=qry;


      $("#" + domid).addClass('btn-danger');
    } else {
  $("#" + domid).removeClass('btn-danger');

}
     var cot=Object.keys(myarray).length;
     var cota=Object.keys(result).length;
     if(cot==cota){

         var pageButtons = $('#fns');
           pageButtons.append('<button onclick="finisFunction()" class="btn btn-info " >finish</button>');
     }






    console.log(qry);
    $.ajax({
      type: "POST",
      url: "../controller/Update_answer.php",
      data: {
        qry: qry,
        qid: saveid
      },
      success: function(data) {

        $('#quest').html(data);

        $(".btn").addClass('btn-info');

      }
    });

  });
});




window.onload = codeAddress;
