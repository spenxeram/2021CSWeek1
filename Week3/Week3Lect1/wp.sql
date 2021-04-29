SELECT wpp.post_title, wpp.post_date,
wpu.user_nicename, wpp.comment_count
FROM wp_posts wpp
JOIN  wp_users wpu ON wpu.ID = wpp.post_author
WHERE wpu.user_nicename = "admin"
ORDER BY wpp.comment_count DESC

DELETE FROM wp_posts
WHERE post_title = '';
