<?php
  $page_name='Sell Airtime';
  
?>
@include('dashboard.header')
  <div class="wrapper">
    @include ('dashboard.sidenav')

    <div class="main">
      <?php
      @include 'top_nav';
      ?>
      <main class="content">
         <div class="container-fluid p-0"> 

          <!-- <h1 class="h3 mb-3">Update News</h1> -->
            <style type="text/css">
                #buyd-cont{
                  display: grid;
                  width: 100%;
                  grid-template-columns: 40% 40%;
                  justify-content: space-between;
                }.load-codes{
                  padding: 10px;
                  background-color: green;
                  margin-bottom:2px;
                  color: white; 
                }
               #receiving-amount{
                  display: none;
                }#edit-btn{
                  background-color: #FBBC04 !important;
                  display: none
                }
                #edit-btn:hover {
                  background-color: #FBBC04 !important;
                }
                @media only screen and (max-width: 700px) {
                     #buyd-cont{
                  grid-template-columns: 100%;
                }#other-side{
                  margin-top: 20px
                }
                  }

                  #after-send{
                    width: 100%;
                    height: 100vh;

                    position: fixed;
                    padding: 10px;
                    z-index: 1000;
                    top: 0px;
                    bottom: 0px;
                    left:0px;
                    right: 0px; 
                    background-color: rgba(0,0,0,.3);
                    display: flex;
                    justify-content: center;
                    align-items:center;
                     display: none;
                  }#inner-dialog-box{
                    width:100%;
                    max-width: 400px;
                    min-height:200px;
                    background-color: white; 
                    box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
                    border-radius: 5px;
                  }#dialog-top-title{
                    display: flex;
                    font-size: 18px;
                    padding: 10px;
                    border-bottom: 1px solid lightgrey
                  }#dialog-top-close{
                    margin-left: auto;
                    font-size: 35px;
                    position: absolute;
                    right: 6px;
                    top: -6px;
                    cursor: pointer;
                   
                  }#dialog-top-title{
                    position: relative;
                  }#inner-dialog-content{
                    padding: 10px
                  }
            </style>
          <div class="row" >
            <div class="col-12" >
              <div class="card" >
          
              </div>
            </div>
          </div>

        </div>
      </main>

        <?php @include 'spec-foot'?>
    </div>
  </div>

  <script type="text/javascript">
   
  </script>

<?php
@include 'footer';
?>