import { MailAdapter, SendMailData } from "./mail-adapter";
import nodemailer from 'nodemailer';

const transport = nodemailer.createTransport({
    host: "smtp.mailtrap.io",
    port: 2525,
    auth: {
        user: "71519336c26b5f",
        pass: "a464d4914e38f5"
    }
});


export class NodemailerMailAdapter implements MailAdapter {
    async sendMail({ subject, body }: SendMailData) {
        await transport.sendMail({
            from: 'Equipe Feedget <oi@feedget.com>',
            to: 'Gustavo Soares <ninjaartz678@gmail.com>',
            subject,
            html: body,
        })
    };
}