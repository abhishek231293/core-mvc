<?php if (Session::get('loggedIn') == true):?>
    </div>
    </div>
    </div>
<?php endif; ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New User</h4>
            </div>
            <div class="modal-body">
                <div id="new_user_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" placeholder="Enter Name." id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email ID</label>
                        <input type="text" placeholder="Enter Email ID." id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="text" placeholder="Enter Password." id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Department</label>
                        <select id="department" name="department"  class="form-control">
                            <option value="3">Guest</option>
                            <option value="2">Super Admin</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">State</label>
                        <select id="state" name="state"  class="form-control">
                            <option value="1">New Delhi</option>
                            <option value="2">Mumbai</option>
                            <option value="3">Bihar</option>
                            <option value="4">Rajasthan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="resetFilters('#new_user_id')" type="button" class="btn btn-danger">Reset</button>
                <button onclick="addNewUser('#new_user_id')" type="button" class="btn btn-success">Add</button>
            </div>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Google map Api -->
<script src="https://maps.googleapis.com/maps/api/js?output=html&libraries=visualization,geometry,places&key=AIzaSyBoooBnGeg8ujDnwfpuco0T8ZvBig44pH0" async defer></script>

<!-- HighCharts -->
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/sweetalert2/4.0.4/sweetalert2.min.js"></script>

<!-- you need to include the ShieldUI CSS and JS assets in order for the Upload widget to work -->

<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>


<script type="text/javascript">
</script>
</body>
</html>