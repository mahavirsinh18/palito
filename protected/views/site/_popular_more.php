<div class="section grid p2">
	<h2 class="title">Most Popular</h2>

	<div class="item_container">			
		 <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$popular_article1->popular_article1(),
            'itemView'=>'_popular_article',
            'template'=>'{items}<div class="col-md-12">{pager}</div>',
            'id'=>'_popular_article1',
            'summaryText'=>"",
            'emptyText'=>"",
            'pager'=> array(
                'selectedPageCssClass'=>'active',
                'maxButtonCount' => '10',
                'firstPageLabel'=>'<<',
                'lastPageLabel'=>'>>',
                'prevPageLabel'=>'<',
                'nextPageLabel'=>'>',
                'cssFile'=>Yii::app()->baseurl.'/css/bootstrap.css',
                'header'=>''
            ),
        )); ?>
	</div>
</div>

<script>
    $(document).ready(function(){
        $('body').on('click', '.book', function(){
            id = $(this).attr("data-id");
            $.ajax({
                type: "post",
                url: '<?php echo Yii::app()->createUrl('site/setbookmark');?>',
                data: {'id':id},
                success: function(){
                    $('.book[data-id="'+id+'"]').find('.remove').attr('checked','checked');
                    $('.book[data-id="'+id+'"]').find('.remove').attr('disabled','disabled');
                },
            });
        })
    })
</script>

<script>
    $(document).ready(function(){
        $('body').on('click', 'button', function(){
            id = $(this).attr("data-id");
            $.ajax({
                type: "post",
                url: '<?php echo Yii::app()->createUrl('site/liked');?>',
                data: {'id':id},
                success: function(){
                    $('.likebtn[data-id="'+id+'"]').find('.thumb').addClass("fa fa-thumbs-up");
                    $('.likebtn[data-id="'+id+'"]').attr('disabled','disabled');
                },
            });
        })
    })
</script>