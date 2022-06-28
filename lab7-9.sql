SELECT domain + path as url,
	   COUNT(*) as requests,
	   SUM(content_length) as traffic
FROM requests
WHERE content_type = 'text/html' AND domain NOT LIKE 'server.%'
GROUP BY domain + path
ORDER BY requests DESC