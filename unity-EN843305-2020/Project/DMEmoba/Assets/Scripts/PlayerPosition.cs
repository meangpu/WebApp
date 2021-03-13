using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;

public class PlayerPosition : MonoBehaviour
{
    public NetworkManager network;
    public TextMeshPro idPlayer;
    public string idKey;

    private readonly float sendInterval = 50 / 1000f;
    private float sendTimer = 0f;

    void Start()
    {
        network = GameObject.Find("NetworkManager").GetComponent<NetworkManager>();
    }

    void Update()
    {
       sendTimer += Time.deltaTime;
       if (sendTimer >= sendInterval)
       {
           if (network.connectionState) {
                UpdatePosition();
            }
       }
    
    }

    async void UpdatePosition()
    { 
        await network.room.Send("position", new { x = transform.position.x, y = transform.position.z });
    }

    public void ChangeName(string newName)
    {
        idPlayer.text = newName;
        idKey = newName;
    }

}
