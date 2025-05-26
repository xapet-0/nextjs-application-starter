<?php get_header(); ?>

<main class="container mx-auto px-4 py-8">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="text-3xl font-bold text-blue-600 mb-4"><?php the_title(); ?></h1>
            <div class="post-meta text-sm text-gray-600 dark:text-gray-400 mb-6">
                <span class="author">By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="hover:underline"><?php the_author(); ?></a></span>
                <span class="categories ml-4">
                    <?php
                    $categories = get_the_category();
                    $separator = ' | ';
                    $output = '';
                    if ( ! empty( $categories ) ) {
                        foreach( $categories as $category ) {
                            $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="hover:underline">' . esc_html( $category->name ) . '</a>' . $separator;
                        }
                        echo trim( $output, $separator );
                    }
                    ?>
                </span>
            </div>
            <div class="post-content text-gray-800 dark:text-gray-200">
                <?php the_content(); ?>
            </div>
        </article>
    <?php
        endwhile;
    else :
    ?>
        <p><?php esc_html_e( 'No content found.', 'codequoi-theme' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
