import { MailAdapter, SendMailData } from "./mail-adapter";
import nodemailer from 'nodemailer';

const transport = nodemailer.createTransport({
    host: "smtp.mailgun.org",
    port: 587,
    auth: {
        user: "postmaster@sandboxe29b7d5ece204205916460b5d48578ee.mailgun.org",
        pass: "ea7e90b71e3234e77de8a6c6634cf357-50f43e91-95dacd74"
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