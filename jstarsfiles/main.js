
        function findTotal(){
        var arr = document.getElementsByName('qty');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('PPTotal').value = tot;
    }


    function findTotal(){
            var arr = document.getElementsByName('qty1');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
    document.getElementById('PITotal').value = tot;
    }

var getCareer = new Array();
getCareer["chkRealistic1"] = 1;
getCareer["chkRealistic2"] = 1;
getCareer["chkRealistic3"] = 1;
getCareer["chkRealistic4"] = 1;
getCareer["chkRealistic5"] = 1;
getCareer["chkRealistic6"] = 1;
getCareer["chkRealistic7"] = 1;
getCareer["chkRealistic8"] = 1;
getCareer["chkRealistic9"] = 1;

function getRealistic()
{
    var rTotal = 0;
    var selectedRealistic = document.forms["frmCareer"]["chkRealistic"];

    for (var sel = 0; sel < selectedRealistic.length; sel++)
    {
      if (selectedRealistic[sel].checked)
      		rTotal += getCareer[selectedRealistic[sel].value]
    }
      
    document.getElementById("lblRealistic").innerHTML = "Total Flight Deck Events: " + rTotal
}//End of function getRealisticCareer()

function submitForm() {
   // Get the first form with the name
   var frm = document.getElementsByName('ac')[0];
   frm.submit(); // Submit
   frm.reset();  // Reset
   return false; // Prevent page refresh
}