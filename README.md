# CMPT 370 Group 42

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

# Editing this README

When you're ready to make this README your own, just edit this file and use the handy template below (or feel free to structure it however you want - this is just a starting point!). Thank you to [makeareadme.com](https://www.makeareadme.com/) for this template.

## Suggestions for a good README
Every project is different, so consider which of these sections apply to yours. The sections used in the template are suggestions for most open source projects. Also keep in mind that while a README can be too long and detailed, too long is better than too short. If you think your README is too long, consider utilizing another form of documentation rather than cutting out information.

## Name
Choose a self-explaining name for your project.

## Description
Let people know what your project can do specifically. Provide context and add a link to any reference visitors might be unfamiliar with. A list of Features or a Background subsection can also be added here. If there are alternatives to your project, this is a good place to list differentiating factors.

## Badges
On some READMEs, you may see small images that convey metadata, such as whether or not all the tests are passing for the project. You can use Shields to add some to your README. Many services also have instructions for adding a badge.

## Visuals
Depending on what you are making, it can be a good idea to include screenshots or even a video (you'll frequently see GIFs rather than actual videos). Tools like ttygif can help, but check out Asciinema for a more sophisticated method.

## Installation
Within a particular ecosystem, there may be a common way of installing things, such as using Yarn, NuGet, or Homebrew. However, consider the possibility that whoever is reading your README is a novice and would like more guidance. Listing specific steps helps remove ambiguity and gets people to using your project as quickly as possible. If it only runs in a specific context like a particular programming language version or operating system or has dependencies that have to be installed manually, also add a Requirements subsection.

## Usage
Use examples liberally, and show the expected output if you can. It's helpful to have inline the smallest example of usage that you can demonstrate, while providing links to more sophisticated examples if they are too long to reasonably include in the README.

## Support
Tell people where they can go to for help. It can be any combination of an issue tracker, a chat room, an email address, etc.

## Roadmap
If you have ideas for releases in the future, it is a good idea to list them in the README.

## Contributing
State if you are open to contributions and what your requirements are for accepting them.

For people who want to make changes to your project, it's helpful to have some documentation on how to get started. Perhaps there is a script that they should run or some environment variables that they need to set. Make these steps explicit. These instructions could also be useful to your future self.

You can also document commands to lint the code or run tests. These steps help to ensure high code quality and reduce the likelihood that the changes inadvertently break something. Having instructions for running tests is especially helpful if it requires external setup, such as starting a Selenium server for testing in a browser.

## Authors and acknowledgment
Show your appreciation to those who have contributed to the project.

## License
For open source projects, say how it is licensed.

## Project status
If you have run out of energy or time for your project, put a note at the top of the README saying that development has slowed down or stopped completely. Someone may choose to fork your project or volunteer to step in as a maintainer or owner, allowing your project to keep going. You can also make an explicit request for maintainers.
