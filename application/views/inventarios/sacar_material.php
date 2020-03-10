<!-- inicio modal content -->
<div id="myModalVer" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">X -Editable</h4>
                                <h6 class="card-subtitle">Inline editor</h6>
                                <table style="clear: both" class="table table-bordered table-striped" id="user">
                                    <tbody>
                                        <tr>
                                            <td width="35%">Simple text field</td>
                                            <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">superuser</a></td>
                                        </tr>
                                        <tr>
                                            <td>Empty text field, required</td>
                                            <td>
                                                <a href="#" id="inline-firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-title="Enter your firstname"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Select, local array, custom display</td>
                                            <td>
                                                <a href="#" id="inline-sex" data-type="select" data-pk="1" data-value="" data-title="Select sex"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Select, error while loading</td>
                                            <td><a href="#" id="inline-status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-title="Select status">Active</a></td>
                                        </tr>
                                        <tr>
                                            <td>Combodate</td>
                                            <td>
                                                <a href="#" id="inline-dob" data-type="combodate" data-value="2015-09-24" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-title="Select Date of birth"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Textarea, buttons below</td>
                                            <td><a href="#" id="inline-comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-title="Enter comments">awesome user!</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- fin modal -->