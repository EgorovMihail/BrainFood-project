<?php
    $disciplin_id = get_the_ID();
    $disciplin_img_src = get_the_post_thumbnail_url($disciplin_id, 'disciplin');
    $disciplin_teacher_name = carbon_get_post_meta($disciplin_id, 'disciplin_teacher_name');
    $disciplin_categories = get_the_terms($disciplin_id, 'disciplin-categories');
    $disciplin_categories_str = '';
    
    foreach ($disciplin_categories as $category) {
        $disciplin_categories_str .= "$category->slug,";
    }
    $disciplin_categories_str = substr($disciplin_categories_str, 0, -1);
?>

<div class="content__item" data-category="<?php echo $disciplin_categories_str; ?>">
    <a href="<?php the_permalink(); ?>" class="course__content-link">
        <div class="course__content-item">
            <img src="<?php echo $disciplin_img_src; ?>" alt="C#" class="course__content-img">
            <h4 class="course__content-title">Дисциплина: <?php the_title(); ?></h4>
            <span class="course__content-nameteacher">Преподаватель: <?php echo $disciplin_teacher_name; ?></span>
            <div class="course__content-description"><?php the_excerpt(); ?></div>
        </div>
    </a>
</div>