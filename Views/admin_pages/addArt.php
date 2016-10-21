<h3><i class="fa fa-angle-right"></i>Добавление</h3>
<!-- BASIC FORM ELELEMNTS -->
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i>  Добавить статью</h4>
            <form action="admin.php" class="form-horizontal style-form" method="GET">
                <input type="hidden" name="view"value="AddCatMethod"/>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Оглавление</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" >Текст</label>
                    <div class="col-sm-5">
                        <textarea type="text" class="form-control" name="text"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" >Автор</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="author">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label" >Картинка</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3">
                        <input type="submit" value="Добавить" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div><!-- col-lg-12-->      	
</div><!-- /row -->
