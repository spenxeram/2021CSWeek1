SELECT wpo.post_title, wpo.post_date,
wu.display_name, wpo.comment_count,
wt.name AS Catagory
FROM wp_posts wpo
JOIN wp_users wu ON wu.ID = wpo.post_author
JOIN wp_term_relationships wtp ON wtp.object_id
= wpo.ID
JOIN wp_term_taxonomy wtt ON wtt.term_taxonomy_id
= wtp.term_taxonomy_id
JOIN wp_terms wt ON wt.term_id = wtt.term_id
ORDER BY wpo.comment_count DESC
LIMIT 0,5 
