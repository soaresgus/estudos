import { useState } from 'react'
import GitHubLogo from '../../assets/github.svg'
import { api } from '../../lib/api';

export function AuthButton() {
    return (
        <a
            href={`https://github.com/login/oauth/authorize?client_id=`}
            className="button-bg rounded-full flex items-center justify-center gap-1 flex-row py-3 px-5"
        >
            <img
                src={GitHubLogo}
                className="w-6 h-6"
            />
            <span>Entrar com GitHub</span>
        </a>
    )
}