import { Camera, Trash } from "phosphor-react";
import html2canvas from "html2canvas";
import { useState } from "react";
import { Loading } from "../Loading";

interface ScreenshotButtonProps {
    onScreenshotTook: (screenshot: string | null) => void;
    screenshot: string | null;
}

export function ScreenshotButton({ 
    screenshot,
    onScreenshotTook 
} : ScreenshotButtonProps) {
    const [isTakingScreenshot, setIsTakingScreenshot] = useState(false)

    async function handleTakeScreenshot() {
        setIsTakingScreenshot(true);

        const canvas = await html2canvas(document.querySelector('html')!);
        const base64Image = canvas.toDataURL('image/png');

        onScreenshotTook(base64Image);

        setIsTakingScreenshot(false);
    }

    if(screenshot) {
        return (
            <button
                type="button"
                className="p-1 w-10 h-10 rounded-md border-transparent flex justify-end items-end text-zinc-400 hover:text-zinc-100 transition-colors"
                onClick={() => onScreenshotTook(null)}
                style={{
                    backgroundImage: `url(${screenshot})`,
                    backgroundPosition: 'right bottom',
                    backgroundSize: 180,
                }}
            >
                <Trash weight="fill" />
            </button>
        );
    }

    return (
        <button
            type="button"
            onClick={handleTakeScreenshot}
            className="button-bg p-2 rounded-md border-transparent transition-colors"
            title="Capturar tela atual"
        >
            {isTakingScreenshot ? <Loading /> : <Camera className="w-6 h-6 " />}
        </button>
    );
}