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

                      