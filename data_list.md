- User Table:

id (int)
username (varchar(255))
password (varchar(255))

- CV Table:

id (int)
fname (varchar(50))
lname (varchar(50))
title (varchar(100))
gender (varchar(10))
dob (date)
location (varchar(100))
objective (text)
hobby (text)
img (varchar(255))
userID (int) [Foreign Key]

- PhoneNumber Table:
id (int)
numbers (varchar(20))
cvID (int) [Foreign Key]

- EmailAddress Table:
id (int)
email (varchar(100))
cvID (int) [Foreign Key]

- SocialLink Table:

id (int)
link (varchar(255))
cvID (int) [Foreign Key]

- Languages Table:
id (int)
lang (varchar(50))
cvID (int) [Foreign Key]

- Degree Table:
id (int)
school (varchar(100))
major (varchar(100))
gpa (decimal(4,2))
startYear (int)
endYear (int)
cvID (int) [Foreign Key]

- WorkExperience Table:
id (int)
company (varchar(200))
title (varchar(200))
detail (text)
startYear (int)
endYear (int)
cvID (int) [Foreign Key]

- Activity Table:
id (int)
title (varchar(200))
detail (text)
startYear (int)
endYear (int)
cvID (int) [Foreign Key]

- Certification Table:
id (int)
year (int)
detail (text)
cvID (int) [Foreign Key]

- Award Table:
id (int)
year (int)
detail (text)
cvID (int) [Foreign Key]