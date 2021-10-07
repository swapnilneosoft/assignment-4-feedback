<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: http://localhost/training/assignment/assignment4/index.php");
}
$data = [];

if (isset($_POST['emp_name'])) {
    $file = $_FILES['proof'];
    if (!empty($file['name'])) {

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $name = $file['name'];
        $newName = "sdfhsd-" . rand(100, 99999999) . "$ext";
        if (move_uploaded_file($file['tmp_name'], "upload/$newName")) {
            $data = [
                "path" => "upload/$newName",
                "emp_name" => $_POST['emp_name'],
                "emp_type" => $_POST['emp_type'],
                "rating" => $_POST['rating'],
                "emp_status" => $_POST['emp_status'],
                "job_title" => $_POST['job_title'],
                "rev_headline" => $_POST['rev_headline'],
                "pros" => $_POST['pros'],
                "cons" => $_POST['cons'],
                "adv_mngmnt" => $_POST['adv_mngmnt'],
            ];
            echo "<script>alert('uploaded file !');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ac7bf073c0.js" crossorigin="anonymous"></script>
    <title>Welcome :: feedback</title>
    <script>
        var stage = 1;
    </script>
    <style>
        .star {
            font-size: 20px;
        }

        .starFilled {
            color: orange;
        }
    </style>
</head>

<body>
    <?php include("nav.php");

    if (!empty($data)) {
    ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 card p-0 m-0">
                    <div class="card-header">
                        <h2>Review Subitted form</h2>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6">Employee name</div>
                            <div class="col-md-6">
                                <?php echo $data['emp_name']; ?>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6">Employee Type</div>
                            <div class="col-md-6">
                                <?php echo $data['emp_type']; ?>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6">Rating</div>
                            <div class="col-md-6">
                                <?php echo $data['rating']; ?> Star
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6">Employee status</div>
                            <div class="col-md-6">
                                <?php echo $data['emp_status']; ?>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6">Job Title</div>
                            <div class="col-md-6">
                                <?php echo $data['job_title']; ?>
                            </div>
                        </div>

                        <div class="row text-center">
                            <div class="col-md-6"> pros</div>
                            <div class="col-md-6">
                                <?php echo $data['pros']; ?>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6"> Cons</div>
                            <div class="col-md-6">
                                <?php echo $data['cons']; ?>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6"> Advice Management</div>
                            <div class="col-md-6">
                                <?php echo $data['adv_mngmnt']; ?>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-md-6">Proof</div>
                            <div class="col-md-6">
                                <?php echo $data['path']; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <script>
            setTimeout(function(){
                window.location.href = "http://localhost/training/assignment/assignment4/welcome.php";
            },4000)
        </script>

    <?php } else { ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 card m-0 p-0">
                    <div class="card-header text-center">
                        <h2>Feedback</h2>
                    </div>
                    <div class="card-body">
                        <form action=" " method="POST" enctype="multipart/form-data">
                            <div class="row stageClass" id="stage1">
                                <div class="col-md-6 p-3 "> <label for="emp">Are you a current or former employee? </label></div>
                                <div class="col-md-6 p-3">
                                    <input type="radio" name="emp_type" id="rad1" class="input-radio" value="1"> Current
                                    <input type="radio" name="emp_type" id="rad2" class="input-radio" value="2"> Former
                                </div>
                                <div class="col-12 p-4">
                                    <div class="form-group">
                                        <label for="emp_name">Employee Name</label>
                                        <input type="text" name="emp_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row stageClass" id="stage2" hidden>
                                <div class="col-md-3 p-2">
                                    <input type="hidden" name="rating" value="" id="rating">
                                    Overall rating
                                </div>
                                <div class="col-md-9 p-2">
                                    <i class="far fa-star star" id="1"></i>
                                    <i class="far fa-star star" id="2"></i>
                                    <i class="far fa-star star" id="3"></i>
                                    <i class="far fa-star star" id="4"></i>
                                    <i class="far fa-star star" id="5"></i>
                                </div>

                                <div class="col-md-3 p-2">
                                    Employee status
                                </div>
                                <div class="col-md-9 p-2">
                                    <div class="form-group">
                                        <select name="emp_status" id="" class="input-select form-control">
                                            <option value="select">--Select</option>
                                            <option value="fulltime">Full Time</option>
                                            <option value="parttime">Part Time</option>
                                            <option value="contract">Contract</option>
                                            <option value="intern">intern</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 p-2">
                                    Job Title
                                </div>
                                <div class="col-md-9 p-2">
                                    <input type="text" name="job_title" class="form-control">
                                </div>
                                <div class="col-md-3 p-2">
                                    Review Headline
                                </div>
                                <div class="col-md-9 p-2">
                                    <input type="text" name="rev_headline" class="form-control">
                                </div>
                                <div class="col-md-3 p-2">
                                    Pros
                                </div>
                                <div class="col-md-9 p-2">
                                    <input type="text" name="pros" class="form-control">
                                </div>
                                <div class="col-md-3 p-2">
                                    Cons
                                </div>
                                <div class="col-md-9 p-2">
                                    <input type="text" name="cons" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    Advice Management
                                </div>
                                <div class="col-md-9">
                                    <textarea name="adv_mngmnt" id="" cols="30" rows="5" class="form-control" style="resize: none;"></textarea>
                                </div>


                            </div>
                            <div class="row stageClass" id="stage3" hidden>
                                <div class="col-md-3 p-2">Proof </div>
                                <div class="col-md-9 p-2">
                                    <input type="file" name="proof" id="" class="form-control">
                                </div>
                                <div class="col-md-2 p-2">
                                    <input type="checkbox" name="agree" id="" class="input-checkbox">
                                </div>
                                <div class="col-md-10 p-2">
                                    Agree terms and conditions
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="button" id="prev">Previous</button>
                        <button class="btn btn-primary" type="button" id="nxt" style="position: absolute;right:10px;">Next</button>
                        <button class="btn btn-success" style="position: absolute;right:10px;" name="submit" type="button" hidden>Submit</button>

                    </div>
                </div>
            </div>
        </div>

    <?php } ?>



    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var prev = $("#prev");
            var nxt = $("#nxt");
            var submit = $('button[name="submit"]');

            function btnInit() {
                if (stage <= 1) {
                    prev.attr("disabled", true);
                } else {
                    prev.removeAttr("disabled");
                }

                if (stage >= 3) {
                    nxt.attr("disabled", true);
                } else {
                    nxt.removeAttr("disabled");
                }
            }

            btnInit();
            var stageClass = $(".stageClass");
            prev.click(function() {
                if (stage < 1) {
                    stage = 1;
                    stageClass.attr("hidden", true);
                    $(`#stage${stage}`).removeAttr("hidden");
                    btnInit();
                } else {
                    stage = stage - 1;
                    stageClass.attr("hidden", true);
                    $(`#stage${stage}`).removeAttr("hidden");
                    btnInit();


                }
                if (stage < 3) {
                    submit.attr("hidden", true);
                } else {
                    submit.removeAttr("hidden");
                }
            });
            nxt.click(function() {
                var rad1 = $("#rad1").is(":checked");
                var rad2 = $("#rad2").is(":checked");
                var emp_name = $('input[name="emp_name"]').val();

                var rating = $('input[name="rating"]').val();
                var emp_status = $('select[name="emp_status"]').val();
                var job_title = $('input[name="job_title"]').val();
                var rev_headline = $('input[name="rev_headline"]').val();
                var pros = $('input[name="pros"]').val();
                var cons = $('input[name="cons"]').val();
                var adv_mngmnt = $('textarea[name="adv_mngmnt"]').val();



                if (stage = 1) {
                    if ((rad1 || rad2) && emp_name != '') {
                        nextStageInit();
                    } else {
                        alert("all field are mandatory of stage 1");
                    }
                }

                if (stage == 2) {
                    if (rating != '' && emp_status != 'select' && job_title != '' && rev_headline != '' && pros != '' && cons != '' && adv_mngmnt != '') {
                        if (pros.length > 15 && pros.length < 200) {
                            if (cons.length > 15 && cons.length < 200) {
                                if (adv_mngmnt.length > 15 && adv_mngmnt.length < 200) {
                                    nextStageInit();
                                } else {
                                    alert("Advice Management field should be min 15 and max 200 charcters");
                                }
                            } else {
                                alert("Cons field should be min 15 and max 200 charcters");
                            }
                        } else {
                            alert("Pros field should be min 15 and max 200 charcters");
                        }
                    } else {
                        alert("all fields are mandotory of stage 2");
                    }
                }
                if (stage == 3) {

                    submit.removeAttr("hidden");

                }
            });



            submit.click(e => {
                var proof = $('input[name="proof"]')[0].files.length;
                var agree = $('input[name="agree"]').is(":checked");

                if (proof != 0 && agree) {
                    $('form').submit();
                } else {
                    alert("please select proof and accept the terms and conditions");
                }
            });
            $('.star').click(e => {

                $('.star').removeAttr("starFilled");
                fillStar(e.target.id);
            });

            function fillStar(ind) {
                var i = 0;
                for (i = 0; i <= parseInt(ind); i++) {
                    $(`#${i}`).removeAttr("starFilled");
                    $(`#${i}`).attr("class", "fas fa-star star starFilled");
                }
                $('#rating').val(parseInt(ind));

            }

            function nextStageInit() {
                if (stage > 3) {
                    stage = 3;
                    stageClass.attr("hidden", true);
                    $(`#stage${stage}`).removeAttr("hidden");
                    btnInit();
                } else {
                    stage = stage + 1;
                    stageClass.attr("hidden", true);
                    $(`#stage${stage}`).removeAttr("hidden");
                    btnInit();
                }
            }
        });
    </script>
</body>

</html>