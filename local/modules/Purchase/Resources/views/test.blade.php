<div id="appu" class="modal" style="background: lightblue">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="box box-success">


                                <div class="box-body">
                                    <div class="modal-header no-padding">
                                        <div class="table-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span class="white">&times;</span>
                                            </button>
                                            Change Password
                                        </div>
                                    </div>
                                    <div id="passwordEditError"></div>
                                    <div class="modal-body padding">
                                        <div class="space-4"></div><div class="space-4"></div><div class="space-4"></div>

                                        <form class="form-horizontal" id="form-change-password" role="form" method="post" action="">
                                           
                                            <input type="hidden" name="change_password_member_id" id="change_password_user_id" value="">

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Current password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" id="current_password" name="current_password" placeholder="" class="col-xs-10 col-sm-9 form-control" value="" />
                                                </div>
                                            </div><br/>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> New password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" id="new_password" name="new_password" placeholder="" class="col-xs-10 col-sm-9 form-control" value="" />
                                                </div>
                                            </div><br/>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Confirm password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" id="re_password" name="re_password" placeholder="" class="col-xs-10 col-sm-9 form-control" value="" />
                                                </div>
                                            </div>


                                            <div class='center spinner-ajax' style="display:none;">
                                                <i class='ace-icon fa fa-spinner fa-spin bigger-250 orange'></i>
                                            </div> 

                                    </div>

                                    <div class="modal-footer no-margin-top">
                                        <button class="btn btn-sm btn pull-left" data-dismiss="modal">
                                            <i class="ace-icon fa fa-times"></i>
                                            Cancel
                                        </button>

                                        <button  type="submit" class="btn btn-sm btn-success pull-left" id="btnChangePassword">
                                            <i class="ace-icon fa fa-check"></i>
                                            Submit
                                        </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

</div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#appu").modal(
                
                );
    });


</script>
<style type="text/css">
    
   #appu {
    max-height:100px;
    overflow:hidden;
}
</style>