# Задача

Контекст

Требуется микросервис, который будет работать на отдельном URL и осуществлять редиректы по "коротким ссылкам". Сервис должен содержать API, с аутентификацией по постоянному токену в хедере (сделать middleware), для их создания.

Бизнес требования

1. Длина slug ссылки не более N символов (задаётся в env), буквы латиницей в обоих регистрах, цифры;
2. Если ссылка не найдена в базе - редирект на определённый URL (задаётся в env);
3. При создании ссылки - указывать время жизни (опционально). Если время жизни не указано - хранить 30 дней;
4. Перед редиректом проверять работает ли ссылка, если нет - редирект на определённый URL (задаётся в env).

