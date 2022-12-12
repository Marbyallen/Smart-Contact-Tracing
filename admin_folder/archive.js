//flag switch toggle test 
let flag = false;

const toggle = () => {
  if ( flag ) {
    //ON
    console.log("toggle ON");
    setInterval(refreshON, 10000);
    document.getElementById("myBtn").innerHTML = "OFF"; //switch to off
    } else {
    //OFF
    console.log("toggle OFF");
    let myInterval = setInterval(refreshON(), 1000);
    clearInterval(myInterval);
    document.getElementById("myBtn").innerHTML = "ON"; //switch to on
    }
    flag = ! flag;
}
function refreshON(){
  // document.location.reload(true);
  $( "printableTable" ).load("stationslistTable.php" );
}

//test 
// var toggle = true;
// function Buttontoggle()
// {
//   var t = document.getElementById("autoRefreshButton");
//   if(t.value=="ON"){

//     t.value="OFF";}
//   else if(t.value=="OFF"){
//     t.value="ON";}
// }


// // REFRESH LOOP test
// setTimeout(() => {
//   var t = document.getElementById("autoRefreshButton");
//   if(t.value=="OFF"){
//     document.location.reload(false);
//     }else {
//       document.location.reload(true);
//     }
//   console.log("setTimeout is called");
// }, 5000);
//

// REFRESH LOOP~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
// setTimeout(() => {
//       document.location.reload(true);
//       console.log("setTimeout is called");
//     }, 5000);

// function autoRefresh() {

//   window.location = window.location.href;
//   console.log('autoRefresh is called');
// }
// setInterval('autoRefresh()', 5000);