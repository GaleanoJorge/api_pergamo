APP_NAME=SGA-EJRLB
APP_ENV=local
APP_KEY=base64:O8Cr9pP0d5vJSH5UdnCRsyCjEVjZZQKUgl39qx37cDU=
APP_DEBUG=true
APP_URL=http://localhost
TELESCOPE_ENABLED=true
FRONT_URL=http://localhost:4200

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=172.18.0.2
DB_PORT=33068
DB_DATABASE=ensename
DB_USERNAME=root
DB_PASSWORD=etraining2020

OLD_SGA_DB_CONNECTION=mysql
OLD_SGA_DB_HOST=35.237.95.161
OLD_SGA_DB_PORT=3306
OLD_SGA_DB_DATABASE=registroacademico
OLD_SGA_DB_USERNAME=developer
OLD_SGA_DB_PASSWORD=EduRed2020.*

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

QUEUE_CONNECTION=redis

REDIS_CLIENT=predis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=odem123
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xxxx@xxxx
MAIL_PASSWORD=xxxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=xxxxxx
MAIL_FROM_NAME="${APP_NAME}"

#MAIL_DRIVER=smtp
#MAIL_HOST=smtp.mailtrap.io
#MAIL_PORT=2525
#MAIL_USERNAME=77aa101f186d5a
#MAIL_PASSWORD=0e4ea02900c640
#MAIL_FROM_ADDRESS=contacto@etraining.co
#MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

#PARAMETROS DE TEAMS RAMAJUDICIAL
TEAMS_CLIENT_ID=1fdc1e25-f33f-4efe-a36a-663fe6f9f0f5
TEAMS_CLIENT_SECRET_KEY=P-uC4-8B7l85vz_.m.Og5W2C99lrnFVLVg
TEAMS_TENANT_ID=622cba98-80f8-41f3-8df5-8eb99901598b
TEAMS_DEFAULT_EMAIL=usprusgabta@cendoj.ramajudicial.gov.co

JWT_SECRET=n1ERrV2DSnj49zl49jk5vkvljK14Rnx7LS6PGkG8ZzfPlLNbtswRjooNzE8WjPMr