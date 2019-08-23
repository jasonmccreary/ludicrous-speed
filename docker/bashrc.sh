_artisan () {
  COMP_WORDBREAKS=${COMP_WORDBREAKS//:}
  COMMANDS=`php artisan --raw --no-ansi list | sed "s/[[:space:]].*//g"`
  COMPREPLY=(`compgen -W "$COMMANDS" -- "${COMP_WORDS[COMP_CWORD]}"`)
  return 0
}

complete -F _artisan art
complete -F _artisan artisan

alias ls='ls --color=auto'
alias ll='ls -la'
alias l.='ls -d .* --color=auto'

cd /app

export PS1="[\[\e[35m\]\u\[\e[m\]\[\e[33m\]@\[\e[m\]\[\e[36m\]\$APP_NAME\[\e[m\] \[\e[32m\]\w\[\e[m\]\[\e[37m\]]\[\e[m\]\[\e[37m\]\\$\[\e[m\] "