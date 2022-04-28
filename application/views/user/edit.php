<script src="<?php echo WEBSITE_ASSETS_ROOT ?>js/blog.js" type="text/javascript"></script>
<div class="news">
    <div style="padding: 15px 100px 15px 100px;">
        <div class="row">
            <div class="col-lg-2 news_col"></div>
            <div class="col-lg-8 news_col">
                <div class="search-filter-wrapper" style="min-height: 500px;">
                    <div style="width: 100%; height: 100%; padding: 30px;">
                        <form action="<?php echo site_url('blog/save')?>" name="frm" id="frm" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
                            <table width="100%">
                                <tr>
                                    <td style="padding: 10px" colspan="2"><input type="text" id="title" name="title" class="form-control input-inline" value="" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'title'); ?>" required="required" /></td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px" colspan="2">
                                        <?php if($type==1) {?>
                                            <textarea class="form-control input-inline" name="desc" id="desc" style="width: 100%; min-width: 100%; min-height: 350px;" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'articlecontent'); ?>" required="required"></textarea>
                                        <?php } else {?>
                                            <textarea class="form-control input-inline" name="desc" id="desc" style="width: 100%; min-width: 100%; min-height: 250px;" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'description'); ?>" required="required"></textarea>
                                        <?php }?>
                                    </td>
                                </tr>
                                <?php if($type>1) {?>
                                    <tr>
                                        <td style="padding: 10px" width="80">
                                            <?php echo get_langdata($this->session->userdata('lang'), 'attachfile'); ?>
                                        </td>
                                        <td>
                                            <input type="file" name="upload" id="upload" value="" accept="<?php echo ($type==2) ? 'image/*' : 'video/mp4';?>" required="required" />
                                        </td>
                                    </tr>
                                <?php }?>
                                <tr>
                                    <td style="padding: 10px" colspan="2">
                                        <?php echo get_langdata($this->session->userdata('lang'), 'explorerange'); ?>:&nbsp;
                                        <input type="radio" name="scope" id="scope" value="0" checked="checked">&nbsp;&nbsp;<?php echo get_langdata($this->session->userdata('lang'), 'toeveryone'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="scope" id="scope" value="1">&nbsp;&nbsp;<?php echo get_langdata($this->session->userdata('lang'), 'tofriends'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-lg-10" style="text-align: right;"></div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn dark btn-outline sbold uppercase">
                                                    <i class="fa fa-check"></i>
                                                    <?php echo get_langdata($this->session->userdata('lang'), 'save'); ?>
                                                </button>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" class="btn dark btn-outline sbold uppercase" onclick="javascript:history.back();">
                                                    <?php echo get_langdata($this->session->userdata('lang'), 'cancel'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 news_col"></div>
        </div>
    </div>
</div>