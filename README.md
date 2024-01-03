# CMPT 370 Project

## Getting started

To make it easy for you to get started with IEEE-app, here's a list of recommended next steps.

## Website (Hosted using AWS Lightsail)

### http://3.82.58.74/

## Generic Admin Account
### Username: `admin@example.com`

### Password: `password`


## Prerequisites 

In order to run the project, you need to install the following tools in your environment

- [x] [PHP v8.2]() or superior
    - Note that the PHP configuration file on your system may need to be modified depending on your OS. Only one member encountered this problem though.
- [x] [Composer]()
- [x] [NodeJS v20]() or superior
- [x] [MySQL v8]()
- [x] [Docker]() (Recomendable since you dont need MySQL already insatlled in your system.)

## First Steps

Clone the branch you want to run in your computer. 
```
git clone -b <branch> https://git.cs.usask.ca/rjg878/cmpt-370.git
cd cmpt-370
```

Then install the packages for the back-end and front end:
```
composer install
npm install
```

Clone the `.env.example` file in the root of the project, and name it `.env`. If you have already 
MySQL running in your system, you have to first set the credentials for the database in that file.

If you have Docker in your system, you can try the Docker alternative steps.

After the creation of the file, run the command:
```
php artisan migrate:fresh --seed
```

This will create and populate the database. The run:
```
php artisan serve
npm run dev
```

Open the web browser at [localhost:8000](http://localhost:8000). 
You're set! 

## Docker alternative
Alternatively, if you have docker installed and running in your system, you can execute:
```
./vendor/bin/sail up
```
This command will create a MySQL and other environment tools to run the project.
After the installation you have to run 
```
./vendor/bin/sail artisan migrate:fresh --seed
```

This will create and populate the database. The run:
```
npm run dev
```

## Integrate with your tools

- [x] [Set up project integrations](https://git.cs.usask.ca/rjg878/cmpt-370/-/settings/integrations)

## Collaborate with your team

- [x] [Invite team members and collaborators](https://docs.gitlab.com/ee/user/project/members/)
- [x] [Create a new merge request](https://docs.gitlab.com/ee/user/project/merge_requests/creating_merge_requests.html)
- [x] [Automatically close issues from merge requests](https://docs.gitlab.com/ee/user/project/issues/managing_issues.html#closing-issues-automatically)
- [x] [Enable merge request approvals](https://docs.gitlab.com/ee/user/project/merge_requests/approvals/)
- [x] [Set auto-merge](https://docs.gitlab.com/ee/user/project/merge_requests/merge_when_pipeline_succeeds.html)

## Test and Deploy

Use the built-in continuous integration in GitLab.

- [x] [Get started with GitLab CI/CD](https://docs.gitlab.com/ee/ci/quick_start/index.html)
- [x] [Analyze your code for known vulnerabilities with Static Application Security Testing(SAST)](https://docs.gitlab.com/ee/user/application_security/sast/)
- [x] [Deploy to Kubernetes, Amazon EC2, or Amazon ECS using Auto Deploy](https://docs.gitlab.com/ee/topics/autodevops/requirements.html)
- [x] [Use pull-based deployments for improved Kubernetes management](https://docs.gitlab.com/ee/user/clusters/agent/)
- [x] [Set up protected environments](https://docs.gitlab.com/ee/ci/environments/protected_environments.html)

***

