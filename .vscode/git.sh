echo "Message de commit :";
read msg;

git add *;
git commit -m "$msg";
git push