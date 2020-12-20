<?php if(!isset($_SESSION)) {session_start();}  include_once '../../src/auth/db_connect.php';
  $link = connect();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

    <title>Dashboard</title>
</head>
<body style="padding:8px">
    <h3><a target="_parent" href="admin_dashboard.php">Back</a></h3>

    <?php

    $name = $_GET['name'];
    switch ($name) {
        case 'users':
            echo "Displaying names";

            $query = "SELECT * FROM users";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User About</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['user_id']?></td>
                                <td><?php echo $value['full_name']?></td>
                                <td><?php echo $value['user_name']?></td>
                                <td><?php echo $value['user_email']?></td>
                                <td><?php echo $value['user_about']?></td>
                                <td><div style="width: 10rem;"><?php echo $value['date_created']?></div></td>
                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'issues':
            echo "Displaying issues";

            $query = "SELECT * FROM issues ORDER BY issue_date DESC";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Issue Name</th>
                        <th>Issue Description</th>
                        <th>Issue Date</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['issue_id']?></td>
                                <td><?php echo $value['issue_name']?></td>
                                <td><?php echo $value['issue_desc']?></td>
                                <td><div style="width: 7rem;"><?php echo $value['issue_date']?></div></td>
                                <td><?php echo $value['status']?></td>
                                <td><a href="../../src/auth/server_auth.php?id=<?php echo $value['issue_id']?>">Update</a></td>
                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'posts':
            echo "Displaying posts";

            $query = "SELECT * FROM topics";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Topic ID</th>
                        <th>Topic Subject</th>
                        <th>Topic Date</th>
                        <th>Topic Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['topic_id']?></td>
                                <td><?php echo $value['topic_subject']?></td>
                                <td><div style="width: 10rem;"><?php echo $value['topic_date']?></div></td>
                                <td><?php echo $value['topic_description']?></td>
                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'reply':
            echo "Displaying replies";

            $query = "SELECT * FROM replies";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Reply ID</th>
                        <th>Reply Content</th>
                        <th>Reply Date</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['reply_id']?></td>
                                <td><?php echo $value['reply_content']?></td>
                                <td><?php echo $value['reply_date']?></td>

                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'comments':
            echo "Displaying comments";

            $query = "SELECT comments.comment_id, comments.comment_message, comments.comment_date, topics.topic_subject FROM comments INNER JOIN topics ON topics.topic_id = comments.comment_topic";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Comment ID</th>
                        <th>Topic Subject</th>
                        <th>Comment Message</th>
                        <th>Comment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['comment_id']?></td>
                                <td><?php echo $value['topic_subject']?></td>
                                <td><?php echo $value['comment_message']?></td>
                                <td><?php echo $value['comment_date']?></td>
                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'categories':
            echo "Displaying categories";

            $query = "SELECT * FROM categories";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['category_id']?></td>
                                <td><?php echo $value['category_name']?></td>
                                <td><?php echo $value['category_description']?></td>
                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'flagged':
            echo "Displaying flaged";

            $query = "SELECT topics.topic_subject, flags.topic_id, flags.description, flags.flag_date, flags.status FROM topics INNER JOIN flags ON topics.topic_id = flags.topic_id ORDER BY flags.flag_date DESC";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Topic subject</th>
                        <th>Flag Description</th>
                        <th>Status</th>
                        <th>Flag Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['topic_subject']?></td>
                                <td><?php echo $value['description']?></td>
                                <td><?php echo $value['status']?></td>
                                <td><?php echo $value['flag_date']?></td>
                                <td><a href="../../src/auth/server_auth.php?delete_id=<?php echo $value['topic_id']?>">Delete</a></td>
                            </tr>
                        <?php
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        default:
            # code...
            break;
    }


    ?>
    <script type="text/javascript">
$(document).ready(function () {
      $('#example').DataTable({
          "processing": true,
          "info": true,
          "stateSave": true,

      });
  });

</script>
</body>
</html>
