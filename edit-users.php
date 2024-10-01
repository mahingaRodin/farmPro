<?php include_once('config.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

	$row	=	$db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');

}



if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	extract($_REQUEST);

	if($username==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);

		exit;

	}elseif($useremail==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);

		exit;

	}elseif($userphone==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);

		exit;

	}

	$data	=	array(

					'username'=>$username,

					'useremail'=>$useremail,

					'userphone'=>$userphone,

					);

	$update	=	$db->update('users',$data,array('id'=>$editId));

	if($update){

		header('location: in.php?msg=rus');

		exit;

	}else{

		header('location: in.php?msg=rnu');

		exit;

	}

}

?>

<!doctype html>

<html lang="en-US">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="in,follow">
    <title>Edit Farmers</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>



<body>







    <div class="container">

        <?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}

		?>

        <div class="card">

            <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>Edit Farmer</strong> <a href="index.php"
                    class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Browse Users</a></div>

            <div class="card-body">



                <div class="col-sm-6">

                    <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>

                    <form method="post">

                        <div class="form-group">

                            <label>Farmer Name <span class="text-danger">*</span></label>

                            <input type="text" name="username" id="username" class="form-control"
                                value="<?php echo isset($row[0]['username'])?$row[0]['username']:''; ?>"
                                placeholder="Enter farmer name" required>

                        </div>

                        <div class="form-group">

                            <label>Farmer Email <span class="text-danger">*</span></label>

                            <input type="email" name="useremail" id="useremail" class="form-control"
                                value="<?php echo isset($row[0]['useremail'])?$row[0]['useremail']:''; ?>"
                                placeholder="Enter farmer email" required>

                        </div>

                        <div class="form-group">

                            <label>Farmer Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="tel form-control" name="userphone" id="userphone"
                                x-autocompletetype="tel"
                                value="<?php echo isset($row[0]['userphone'])?$row[0]['userphone']:''; ?>"
                                placeholder="Enter farmer phone" required>

                        </div>

                        <div class="form-group">

                            <input type="hidden" name="editId" id="editId"
                                value="<?php echo isset($_REQUEST['editId'])?$_REQUEST['editId']:''?>">

                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
                                    class="fa fa-fw fa-edit"></i> Update Farmer</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>



    <div class="container my-4">

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752"
            data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
    <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
    <script>
    $(document).ready(function() {
        jQuery(function($) {
            var input = $('[type=tel]')
            input.mobilePhoneNumber({
                allowPhoneWithoutPrefix: '+1'
            });
            input.bind('country.mobilePhoneNumber', function(e, country) {
                $('.country').text(country || '')
            })
        });
    });
    </script>


</body>

</html>