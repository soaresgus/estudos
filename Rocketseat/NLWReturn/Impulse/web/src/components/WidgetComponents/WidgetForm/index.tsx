import { useState } from "react";

import { CloseButton } from "../CloseButton";

import BugImportUrl from '../../../assets/bug.svg';
import IdeaImportUrl from '../../../assets/idea.svg';
import ThoughtImportUrl from '../../../assets/thought.svg';
import { FeedbackTypeStep } from "./Steps/FeedbackTypeStep";
import { FeedbackContentStep } from "./Steps/FeedbackContentStep";
import { FeedbackSuccessStep } from "./Steps/FeedbackSuccessStep";
import { ThemeButton } from "../ThemeButton";

export const feedbackTypes = {
    BUG: {
        title: 'Problema',
        image: {
            source: BugImportUrl,
            alt: 'Imagem de um inserto'
        }
    },
    IDEA: {
        title: 'Ideia',
        image: {
            source: IdeaImportUrl,
            alt: 'Imagem de uma lâmpada'
        }
    },
    OTHER: {
        title: 'Outro',
        image: {
            source: ThoughtImportUrl,
            alt: 'Imagem de um pensamento'
        }
    }
}

export type FeedbackType = keyof typeof feedbackTypes;

export function WidgetForm() {
    const [feedbackType, setFeedbackType] = useState<FeedbackType | null>(null)
    const [feedbackSent, setFeedbackSent] = useState(false);

    function handleRestartFeedback() {
        setFeedbackType(null);
        setFeedbackSent(false);
    }

    return (
        <div
            className="p-4 relative rounded-2xl mb-4 flex flex-col items-center shadow-lg w-[calc(100vw-2rem)] md:w-auto"
            style={{
                backgroundColor: 'var(--surface-primary)',
            }}
        >
            {feedbackSent ? (
                <FeedbackSuccessStep onFeedbackRestartRequested={handleRestartFeedback} />
            ) : (
                <>
                    {!feedbackType ? (
                        <FeedbackTypeStep onFeedbackTypeChanged={setFeedbackType} />
                    ) : (
                        <FeedbackContentStep
                            feedbackType={feedbackType}
                            onFeedbackRestartRequested={handleRestartFeedback}
                            onFeedbackSent={() => setFeedbackSent(true)}
                        />
                    )}
                </>
            )}

            <footer className="text-xs text-neutral-400 flex flex-row items-center justify-center">
                <span className="mr-2">Feito com ♥ por <a className="underline underline-offset-2" href="https://github.com/soaresgus" target="__blank">Gustavo Soares</a></span>
                <ThemeButton />
            </footer>
        </div>
    );
}