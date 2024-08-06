# payroll
the payroll system is a software application designed to manage and automate the process of paying employees. This includes calculating wages, withholding taxes and deductions, and ensuring that employees are paid accurately and on time. In our case, we are implementing a payroll system using PHP, a widely-used server-side scripting language known for its robustness and ease of integration with databases.


## Requirements
1. PHP verison 8.1 and earlier verison
2. git bash terminal for executing commands
3. integrated development tool (VS-Code Preferable)

## Working as a Team

### Getting started
NOTE: alway use the git terminal on your local machine
1. Fork the Repository using the fork button from the payroll repo
2. clone the forked repo to your local machine
```
git clone https://github.com/<git_user_name>/payroll.git
```
3. to write your new code, create a branch to work on non-distructively using the command
```
git checkout -b your_branch_name
```
### Making MR
1. First synchronize your forked remote repo using the sync button.
2. on your local machine terminal switch to the main branch using the command
```
git switch main
```
3. pull the changes that was synchronized from the forked repo
```
git pull
```
4. Now switch to your branch to merge the changes to branch
```
git switch your_branch_name
```
5. to merge the changes after been sure that you are on your branch
```
git merge main
```
6. push your changes using the commmand below to your forked repo
```
git add .
git commit -m "Your commit message"
git push origin your_branch_name
```
7. goto your remote repo on github and switch to your pushed branch, then locate the PR tab and make an MR request.
