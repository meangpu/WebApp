using UnityEngine;
using UnityEngine.InputSystem;

public class cameraSwitcher : MonoBehaviour
{
    public GameObject mainCam;
    public GameObject frontcam;
    public GameObject backCam;

    AudioListener audioMainCam;
    AudioListener audioFrontCam;
    AudioListener audioBackCam;

    private void Awake() {
        audioMainCam = mainCam.GetComponent<AudioListener>();
        audioFrontCam = frontcam.GetComponent<AudioListener>();
        audioBackCam = backCam.GetComponent<AudioListener>();
    }

    public void SetCamera(bool bCamMain, bool bCamFront, bool bCamBack)
    {
        mainCam.SetActive(bCamMain);
        audioMainCam.enabled = bCamMain;

        frontcam.SetActive(bCamFront);
        audioFrontCam.enabled = bCamFront;

        backCam.SetActive(bCamBack);
        audioBackCam.enabled = bCamBack;
    }

    public void ToMainCam()
    {
        SetCamera(true, false, false);
    }

    public void ToFrontCam()
    {
        SetCamera(false, true, false);
    }

    public void ToBackCam()
    {
        SetCamera(false, false, true);
    }


}
