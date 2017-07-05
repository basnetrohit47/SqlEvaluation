//global Access veriable
var result;
var saveid;
var domid;
var myarray = {};


//auto called function
function codeAddress() {

  //Time Counter
  var count = 10;
  var counter = setInterval(timer, 1000); //1000 will  run it every 1 second
  function timer() {
    count = count - 1;
    if (count <= 0) {
      clearInterval(counter);
      final();
      return;
    }
    document.getElementById("timer").innerHTML = count + " minutes"; // watch for spelling
  }



//ajax to get the questions
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "../controller/Ctrl_Question.php",
    success: function(data) {
      result = data;
      var a = 0;
      var pageButtons = $('#try');
      for (var key in data) {
        a++;
        pageButtons.append('<button onclick="myFunction(this.id)" class="btn btn-info " id="' + data[key].rank + '">' + a + '</button>');
      }
    }
  });

}

//function to dispaly question by clicking button
function myFunction(id) {
  domid = id;
  var a = id - 1;
  saveid = result[a].question_id;
  var vname = result[a].question_text;
  var q = myarray[id];
  $('#qry_text').val(q);
  $('#quest').html(vname);

}


//finalize
function final() {
  $.ajax({
    type: "POST",
    url: "../controller/Ctrl_finalize.php",
    success: function(data) {
      window.location.href = '../controller/evaluation.php';
    }
  });


}




//ajax function to update answer
$(document).ready(function() {
  $(".btn_insert").click(function() {
    var qry = $('#qry_text').val();
    if (qry !== 0) {
      myarray[domid] = qry;
      $("#" + domid).addClass('btn-danger');
    } else {
      $("#" + domid).removeClass('btn-danger');
    }
    var cot = Object.keys(myarray).length;
    var cota = Object.keys(result).length;
    if (cot == cota) {
      var pageButtons = $('#fns');
      pageButtons.append('<button onclick="final()" class="btn btn-info " >finish</button>');
    }

//ajax to update the query
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
