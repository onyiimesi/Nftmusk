<?php include "inc/header.php"; ?>

	<?php

        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])){

            $upload = $user->upload($_POST, $_FILES);
        }

    ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
            	<div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        	<h4 class="card-title">Upload NFT</h4><hr>
                            <p class="card-description">
                            </p>

                            <?php  

                            	if(isset($upload)){
                            		echo $upload;
                            	}

                            ?>

                            <form action="" method="post" enctype="multipart/form-data" class="mb-5">
                            	<div class="mb-4">
                            		<span style="font-size: 12px; color: red;">* Required fields</span><br>
	                                <label for="" class="form-label"><strong>Image, Video, or Audio</strong></label><br>
	                                <span style="font-size: 13px;">File types supported: JPG, PNG, GIF, SVG, MP4, WEBM, MP3. Max size: 100MB</span><br>
                                	<input type="file" name="file" class="form-control">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>Name <span style="color: red;">*</span></strong></label><br>
                                	<input type="text" name="name" class="form-control" placeholder="Name">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>External link</strong></label><br>
	                            	<span style="font-size: 13px;">NFTMUSK will include a link to this URL on this item's detail page, so that users can link to learn more about it. You are welcome to link to link to your own webpage with more details.</span><br>
                                	<input type="text" name="link" class="form-control" placeholder="https://yoursite.com/item/123">
	                            </div>
	                            <div class="mb-4">
	                            	<label for="" class="form-label"><strong>Description</strong></label><br>
	                            	<span style="font-size: 13px;">The description will be included on the item's detail page underneath its image.</span><br>
                                	<textarea name="description" class="form-control" placeholder="Provide a detailed description of your item" id="" cols="30" rows="10"></textarea>
	                            </div>
	                            <button type="submit" name="upload" class="btn btn-success">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    








<?php include "inc/footer.php"; ?>