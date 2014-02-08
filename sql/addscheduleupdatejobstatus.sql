create EVENT updateJobStatus
 ON SCHEDULE EVERY 1 DAY
 DO
 -- Run automatically daily, set jobstatus=2 closed for application(cannot be cancelled by employer and applicants cannot quit) for jobs where 2 day before job start.
 UPDATE job_t SET JobStatus=2 WHERE JobDate < DATE_SUB(NOW(), INTERVAL 2 DAY) AND JobStatus!=3