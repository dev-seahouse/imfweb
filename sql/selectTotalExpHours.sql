select JobDate,CheckIn,CheckOut,JobRate,JobEBR,JobMinEBRHours,ExpHours,JobApplicant_t.UserID,(select sum(expHours) from jobapplicant_t where jobapplicant_t.UserID=User_t.UserID) as TotalExp from user_t
join jobapplicant_t on user_t.UserID=jobapplicant_t.UserID
join job_t on job_t.JobID=jobapplicant_t.JobID
join scope_t on job_t.ScopeID=scope_t.ScopeID
