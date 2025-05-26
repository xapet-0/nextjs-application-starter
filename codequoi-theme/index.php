<?php get_header(); ?>

<main class="container mx-auto px-4 py-8">
    <?php if ( have_posts() ) : ?>
        <div class="posts-list space-y-12">
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('border-b border-gray-300 dark:border-gray-700 pb-6'); ?>>
                    <h2 class="text-2xl font-bold text-blue-600 hover:text-blue-800">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-meta text-sm text-gray-600 dark:text-gray-400 mt-1 mb-3">
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
                    <div class="post-excerpt text-gray-800 dark:text-gray-200">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="inline-block mt-3 text-blue-600 hover:text-blue-800 font-semibold">Read More</a>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination mt-8 flex justify-center space-x-4 text-blue-600">
            <?php
            echo paginate_links( array(
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
            ) );
            ?>
        </div>

    <?php else : ?>
        <p><?php esc_html_e( 'No posts found.', 'codequoi-theme' ); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
