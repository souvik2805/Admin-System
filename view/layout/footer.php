         <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <center>
                            <p>© 2020  Digital-Contract Superadmin by <a href="https://www.crispdigitalindia.com/" target="_blank">Crisp Digital India </a>- All Rights Reserved
                        </center>
                        </div>
                        <div class="col-md-3"></div>
                       
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script  src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>



    <!-- Morris Custom Js-->
    <script src="assets/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

        $('#filter').click(function(){
            // alert("This iscaelld");
            var sales_person = $('#sales_person').val();
            var adv_name     = $('#adv_name').val();
            var e_f_d        = $('#e_f_d').val();
            var e_e_d        = $('#e_e_d').val();

            // console.log(sales_person);
            // console.log(adv_name);
            // console.log(e_f_d);
            // console.log(e_e_d);
            // if(empty(adv_name)){
            //     console.log("Thisis");
            // }
            
             $.ajax({
                type:'POST',
                url:'ajax/filter.php',
                data: {                    
                    sales_person : sales_person, 
                    adv_name     : adv_name,
                    e_f_d        : e_f_d,
                    e_e_d        : e_e_d,
                    action       : 100                     
                },
                success:function(data){

                    // console.log(data);
                  $("#append_id").html(data);
                     
                }
             }); 

             
          });

    </script>

</body>


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2020 09:23:48 GMT -->
</html>