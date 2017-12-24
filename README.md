# Dani Springer Bot
- Telegram Bot that gives you various links for Dani Springer (that's me **:D**)
- Find it here: [http://t.me/danispringerbot](http://t.me/danispringerbot)
- Comments/Questions/Suggestions/Kangaroos: [https://danispringer.github.io/](https://danispringer.github.io/)

# How can I use this code?
- Telegram is new for me, so my docs won't be up to par. At all. But...
- Check out this article: [https://www.salvatorecordiano.it/creare-un-bot-telegram-guida-passo-passo/](https://www.salvatorecordiano.it/creare-un-bot-telegram-guida-passo-passo/)
- It's in Italian, but thank G-d, we have Google Translate Etc. Do yourself a favor: read it before trying to use *my* poorly written instructions.
- You'll use Heroku to deploy, and Dropbox to host (yeah, GitHub is probably better, but again I'm not an expert in Telegram so I followed the article's instructions, but Heroku allows GitHub deploying as well Dropbox, so if you want to try it, go right ahead!).
- First, create your bot using the Father of all bots (don't trust me on this: Google 'How to create a Telegram bot'. It's easy). Then
- Create a Heroku account and choose to create a new php app.
- Connect Heroku to Dropbox (look for such a option on the Heroku website itself).
- Doing this will create a folder in a folder in your Dropbox, and that's where you should place the rest of your files later (in the deepest folder).
- You plop the register.php file in the Dropbox folder (you know which one!), deploy your 'App' on Heroku (it should say "success" if...it works), visit https:// yourbotname . herokuapp . com/execute.php (without the spaces, duh) to hook up your DropBox with your bot.
- You should get a success message (on the resulting browser page), otherwise you need to fix your code somewhere...Yup, more coffee.
- If successful so far:
- Delete the register file from Dropbox
- Plop the rest of the files in Dropbox (note: **execute.php** is where the fun happens. You should only need to edit that one, besides the minimal and necessary edits to **register.php**, and of course **commands.txt** - if you want to use it).
- Deploy again on Heroku.

## How can I update my bot's code?
- Every time you want to make a change: edit in your favorite editor (Or maybe Dropbox itself allows editing but..Ew...)
- Upload the updated file (probably **execute.php**) to Dropbox (drag-and-drop might help you)
- Deploy on Heroku again.

###### MIT License