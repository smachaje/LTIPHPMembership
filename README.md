# LTIPHPMembership
Implementation of the https://github.com/celtic-project/LTI-PHP project with demo code for Membership service

To run this sample app, which simply returns a list of users in a course via LTI:

1. Create a MySQL database based on the parent project and SQL in src/sql directory
2. Include connection data in index.php
3. Approve your PHP server domain name in Blackboard under LTI
4. Create a placement as course tool in Blackboard (Web Link will not expose the membership service)

This sample app processes OAuth, validates key/secret, and downloads list of students.
