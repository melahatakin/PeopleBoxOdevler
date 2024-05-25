<?php
    session_start();
    require "libs/vars.php";
    require "libs/functions.php";

    $id = $_GET["id"];
    $result = getBlogByID($id);
    $selectedBlog = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $image = $_POST["image"];
        $url = $_POST["url"];
        $isActive = isset($_POST["isActive"]) ? 1 : 0;

        if (editBlog($id, $title, $description, $image, $url, $isActive)) {
            $_SESSION['alert_message'] = "<div class='alert alert-success'>Başrılı Güncelleme.</div>";
            header('Location: blog-edit.php?id=' . $id);
            exit();
        } else {
            $_SESSION['alert_message'] = "<div class='alert alert-danger'>Güncelleme Hatası.</div>";
            header('Location: blog-edit.php?id=' . $id);
            exit();
        }
    }

    $alert_message = isset($_SESSION['alert_message']) ? $_SESSION['alert_message'] : '';
    unset($_SESSION['alert_message']);
?>

<?php include "views/_header.php"; ?>
<?php include "views/_navbar.php"; ?>

<div class="container my-3">
    <div class="row">
        <div class="col-3">
            <?php include "views/_menu.php"; ?>
        </div>
        <div class="col-9">
            <?php echo $alert_message; ?>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $selectedBlog['title']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Açıklama</label>
                            <textarea class="form-control" name="description" id="description"><?php echo $selectedBlog['description']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Resim</label>
                            <input type="text" class="form-control" name="image" id="image" value="<?php echo $selectedBlog['image']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" name="url" id="url" value="<?php echo $selectedBlog['url']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="isActive" class="form-label">Aktif mi?</label>
                            <input type="checkbox" name="isActive" id="isActive" <?php echo $selectedBlog['isActive'] ? 'checked' : ''; ?>>
                        </div>

                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "views/_footer.php"; ?>
